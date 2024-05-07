<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_id',
        'user_id',
        'quotation_number',
        'code_delivery',
        'shipping_unit',
        'shipping_fee',
        'detailexport_id',
        'workspace_id',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $table = 'delivery';

    public function delivered()
    {
        return $this->hasOne(Delivered::class, 'delivery_id');
    }

    public function quoteexport()
    {
        return $this->hasOne(QuoteExport::class, 'detailexport_id');
    }

    public function checkSL($data)
    {
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->select('*', 'detailexport.id as maXuat')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
            ->where('detailexport.id', $data['detailexport_id'])
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) > 0')
            ->get();
        $check = !$delivery->isEmpty();

        return $check;
    }

    public function addDelivery($data)
    {
        if (isset($data['shipping_fee'])) {
            $shipping_fee = $data['shipping_fee'];
            if ($shipping_fee !== null) {
                $shipping_fee = str_replace(',', '', $shipping_fee);
            }
        } else {
            $shipping_fee = 0;
        }
        if (isset($data['shipping_unit'])) {
            $shipping_unit = $data['shipping_unit'];
        } else {
            $shipping_unit = null;
        }
        if (isset($data['date_deliver'])) {
            $date_deliver = $data['date_deliver'];
        } else {
            $date_deliver = Carbon::now();
        }
        $dataDelivery = [
            'guest_id' => $data['guest_id'],
            'quotation_number' => $data['quotation_number'],
            'code_delivery' => $data['code_delivery'],
            'shipping_unit' => $shipping_unit,
            'shipping_fee' => $shipping_fee,
            'detailexport_id' => $data['detailexport_id'],
            'status' => 1,
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => $date_deliver == null ? now() : $date_deliver,
            'user_id' => Auth::user()->id,
        ];
        $delivery = new Delivery($dataDelivery);
        $delivery->save();

        $detailexportId = $delivery->id;
        QuoteExport::where('detailexport_id', $data['detailexport_id'])
            ->update(['deliver_id' => $detailexportId]);
        return $delivery->id;
    }
    public function getDeliveryToId($id)
    {
        $delivery = Delivery::where('delivery.id', $id)
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            // ->leftJoin('guest', 'delivery.guest_id', 'guest.id')
            ->leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            // ->leftJoin('represent_guest', 'detailexport.represent_id', 'represent_guest.id')
            ->select('*', 'delivery.id as soGiaoHang', 'delivery.status as tinhTrang', 'delivery.created_at as ngayGiao')
            ->first();
        return $delivery;
    }
    public function getProductToId($id)
    {
        $product = Delivery::join('quoteexport', 'delivery.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('delivered', function ($join) {
                $join->on('delivered.delivery_id', '=', 'delivery.id');
                $join->on('delivered.product_id', '=', 'quoteexport.product_id');
            })
            ->join('products', 'products.id', 'delivered.product_id')
            ->where('quoteexport.status', 1)
            ->where('delivery.id', $id)
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.product_note',
                'quoteexport.product_note',
                'delivered.price_export',
                'quoteexport.product_ratio',
                'products.product_inventory',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivered.deliver_qty',
                'delivery.created_at as ngayGiao',
                'products.type',
                'products.check_seri',
            )
            ->groupBy(
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'delivered.deliver_qty',
                'products.product_inventory',
                'quoteexport.product_id',
                'quoteexport.product_note',
                'delivered.price_export',
                'quoteexport.product_ratio',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivery.created_at',
                'products.type',
                'products.check_seri',
            )
            ->get();
        return $product;
    }
    public function updateDetailExport($data, $detailexport_id)
    {
        if (isset($data['shipping_fee'])) {
            $shipping_fee = $data['shipping_fee'];
            if ($shipping_fee !== null) {
                $shipping_fee = str_replace(',', '', $shipping_fee);
            }
        } else {
            $shipping_fee = 0;
        }
        if (isset($data['shipping_unit'])) {
            $shipping_unit = $data['shipping_unit'];
        } else {
            $shipping_unit = null;
        }
        //cập nhật delivery
        $delivery = Delivery::where('detailexport_id', $detailexport_id)->first();
        if ($delivery) {
            $delivery->update([
                'shipping_unit' => $shipping_unit,
                'shipping_fee' => $shipping_fee,
            ]);
        }
        //
        $quoteExports = QuoteExport::where('detailexport_id', $detailexport_id)
            ->where('status', 1)
            ->get();

        // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
        $hasNonZeroDifference = false;

        foreach ($quoteExports as $quoteExport) {
            $product_id = $quoteExport->product_id;

            // Lấy tất cả các bản ghi delivered có product_id tương ứng và status = 2 từ bảng Delivery
            $deliveriesForProduct = Delivered::join('delivery', 'delivery.id', '=', 'delivered.delivery_id')
                ->where('delivery.detailexport_id', $detailexport_id)
                ->where('delivered.product_id', $product_id)
                ->where('delivery.status', 2)
                ->get();

            // Tính tổng deliver_qty
            $totalDeliveredQty = $deliveriesForProduct->sum('deliver_qty');
            $productQty = bcsub($quoteExport->product_qty, '0', 4);

            // So sánh tổng deliver_qty với product_qty
            if (bccomp($totalDeliveredQty, $productQty, 4) !== 0) {
                $hasNonZeroDifference = true;
                break;
            }
        }

        $detailExport = DetailExport::where('id', $detailexport_id)->first();

        if ($detailExport) {
            $detailExport->update([
                'status' => 2,
            ]);
            if ($hasNonZeroDifference) {
                $detailExport->update([
                    'status_receive' => 3,
                ]);
            } else {
                $detailExport->update([
                    'status_receive' => 2,
                ]);
                if ($detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
                    $detailExport->update([
                        'status' => 3,
                    ]);
                }
            }
        }
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product = Products::find($data['product_id'][$i]);
            if ($product) {
                if ($product->type != 2) {
                    $result = $product->product_inventory - $data['product_qty'][$i];
                    $product->update([
                        'product_inventory' => $result,
                    ]);
                }
            }
        }
        if (isset($data['id_seri'])) {
            $id_seri = $data['id_seri'];

            foreach ($id_seri as $serialNumberId) {
                $serialNumber = Serialnumber::find($serialNumberId);
                if ($serialNumber) {
                    $serialNumber->update([
                        'detailexport_id' => $detailexport_id,
                        'status' => 2,
                    ]);
                }
            }
        }
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'soGiaoHang')->where('table_name', $name)->get();
    }
    public function getInfoQuote($idQuote)
    {
        $delivery = DetailExport::where('detailexport.id', $idQuote)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')->first();
        return $delivery;
    }
    public function getProductQuote($idQuote)
    {
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->select('quoteexport.*', 'detailexport.id as maXuat', 'quoteexport.product_id as maSP')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) as soLuongCanGiao')
            ->leftJoin('serialnumber', function ($join) {
                $join->on('serialnumber.product_id', '=', 'products.id');
                $join->where('serialnumber.detailexport_id', 0);
            })
            ->where('detailexport.id', $idQuote)
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_delivery, 0) > 0')
            ->get();

        // Group dữ liệu theo ID sản phẩm để có danh sách seri cho mỗi sản phẩm
        $groupedDelivery = $delivery->groupBy('maSP');

        // Xử lý dữ liệu để thêm danh sách seri vào mỗi sản phẩm
        $processedDelivery = $groupedDelivery->map(function ($group) {
            $product = $group->first();
            $product['seri_pro'] = $group->pluck('serinumber')->toArray();
            return $product;
        });

        return $processedDelivery;
    }
    public function deleteDelivery($data, $id)
    {
        $delivery = Delivery::find($id);
        if ($delivery) {
            $delivered_id = Delivered::where('delivery_id', $delivery->id)->first();
            if ($delivered_id) {
                History::where('delivered_id', $delivered_id->id)->delete();
            }
        }
        Serialnumber::where('detailexport_id', $delivery->detailexport_id)
            ->update([
                'status' => 1,
                'detailexport_id' => 0,
                'delivery_id' => 0,
            ]);
        for ($i = 0; $i < count($data['product_name']); $i++) {
            if (!empty($data['product_id'][$i])) {
                $quoteExport = QuoteExport::where('detailexport_id', $delivery->detailexport_id)
                    ->where('product_id', $data['product_id'][$i])->first();
                $quoteExport->qty_delivery = $quoteExport->qty_delivery - $data['product_qty'][$i];
                $quoteExport->save();
            }
        }
        if ($delivery->status == 1) {
            Delivered::where('delivery_id', $id)->delete();
        } elseif ($delivery->status == 2) {
            $deliveredItems = Delivered::where('delivery_id', $id)->get();
            foreach ($deliveredItems as $deliveredItem) {
                $product = Products::find($deliveredItem->product_id);
                if ($product) {
                    if ($product->type != 2) {
                        $product->product_inventory += $deliveredItem->deliver_qty;
                        $product->save();
                    }
                }
            }
            Delivered::where('delivery_id', $id)->delete();
            $deliveredCount = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
                ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
                ->where('delivery.status', 2)
                ->count();
            if ($deliveredCount > 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status_receive' => 3,
                    ]);
            } else {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status_receive' => 1,
                    ]);
            }
        }
        $deliveredCount = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->count();
        $BillCount = productBill::where('bill_sale.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('bill_sale', 'product_bill.billSale_id', 'bill_sale.id')
            ->count();
        $PayCount = productPay::where('pay_export.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('pay_export', 'product_pay.pay_id', 'pay_export.id')
            ->count();
        if ($deliveredCount == 0 && $BillCount == 0 && $PayCount == 0) {
            DetailExport::where('id', $delivery->detailexport_id)
                ->update([
                    'status' => 1,
                ]);
        } else {
            DetailExport::where('id', $delivery->detailexport_id)
                ->update([
                    'status' => 2,
                ]);
        }
        QuoteExport::where('product_delivery', $id)->delete();
        Delivery::find($id)->delete();
    }
    public function deleteDeliveryItem($id)
    {
        $delivery = Delivery::find($id);
        if ($delivery) {
            $delivered_id = Delivered::where('delivery_id', $delivery->id)->first();
            if ($delivered_id) {
                History::where('delivered_id', $delivered_id->id)->delete();
            }
        }
        Serialnumber::where('detailexport_id', $delivery->detailexport_id)
            ->update([
                'status' => 1,
                'detailexport_id' => 0,
                'delivery_id' => 0,
            ]);
        $product = Delivery::join('quoteexport', 'delivery.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('delivered', function ($join) {
                $join->on('delivered.delivery_id', '=', 'delivery.id');
                $join->on('delivered.product_id', '=', 'quoteexport.product_id');
            })
            ->join('products', 'products.id', 'delivered.product_id')
            ->where('delivery.id', $id)
            ->where('quoteexport.status', 1)
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.product_note',
                'quoteexport.product_note',
                'quoteexport.price_export',
                'quoteexport.product_ratio',
                'products.product_inventory',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivered.deliver_qty',
                'delivery.created_at as ngayGiao'
            )
            ->groupBy(
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'delivered.deliver_qty',
                'products.product_inventory',
                'quoteexport.product_id',
                'quoteexport.product_note',
                'quoteexport.price_export',
                'quoteexport.product_ratio',
                'quoteexport.product_tax',
                'quoteexport.price_import',
                'quoteexport.product_total',
                'delivery.created_at'
            )
            ->get();
        foreach ($product as $item) {
            $quoteExport = QuoteExport::where('detailexport_id', $delivery->detailexport_id)
                ->where('status', 1)
                ->where('product_id', $item->product_id)
                ->first();

            if ($quoteExport) {
                $quoteExport->qty_delivery = $quoteExport->qty_delivery - $item->deliver_qty;
                $quoteExport->save();
            }
        }
        if ($delivery->status == 1) {
            Delivered::where('delivery_id', $id)->delete();
        } elseif ($delivery->status == 2) {
            $deliveredItems = Delivered::where('delivery_id', $id)->get();
            foreach ($deliveredItems as $deliveredItem) {
                $product = Products::find($deliveredItem->product_id);
                if ($product) {
                    if ($product->type != 2) {
                        $product->product_inventory += $deliveredItem->deliver_qty;
                        $product->save();
                    }
                }
            }
            Delivered::where('delivery_id', $id)->delete();
            $deliveredCount = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
                ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
                ->where('delivery.status', 2)
                ->count();
            if ($deliveredCount > 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status_receive' => 3,
                    ]);
            } else {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status_receive' => 1,
                    ]);
            }
        }
        $deliveredCount = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->count();
        $BillCount = productBill::where('bill_sale.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('bill_sale', 'product_bill.billSale_id', 'bill_sale.id')
            ->count();
        $PayCount = productPay::where('pay_export.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('pay_export', 'product_pay.pay_id', 'pay_export.id')
            ->count();
        if ($deliveredCount == 0 && $BillCount == 0 && $PayCount == 0) {
            DetailExport::where('id', $delivery->detailexport_id)
                ->update([
                    'status' => 1,
                ]);
        } else {
            DetailExport::where('id', $delivery->detailexport_id)
                ->update([
                    'status' => 2,
                ]);
        }
        QuoteExport::where('product_delivery', $id)->where('status', 1)->delete();
        Delivery::find($id)->delete();
    }
    public function acceptDelivery($data)
    {
        //thêm delivery
        if (isset($data['shipping_fee'])) {
            $shipping_fee = $data['shipping_fee'];
            if ($shipping_fee !== null) {
                $shipping_fee = str_replace(',', '', $shipping_fee);
            }
        } else {
            $shipping_fee = 0;
        }
        if (isset($data['shipping_unit'])) {
            $shipping_unit = $data['shipping_unit'];
        } else {
            $shipping_unit = null;
        }
        if (isset($data['date_deliver'])) {
            $date_deliver = $data['date_deliver'];
        } else {
            $date_deliver = Carbon::now();
        }
        $dataDelivery = [
            'guest_id' => $data['guest_id'],
            'user_id' => Auth::user()->id,
            'quotation_number' => $data['quotation_number'],
            'code_delivery' => $data['code_delivery'],
            'shipping_unit' => $shipping_unit,
            'shipping_fee' => $shipping_fee,
            'detailexport_id' => $data['detailexport_id'],
            'workspace_id' => Auth::user()->current_workspace,
            'status' => 2,
            'created_at' => $date_deliver,
        ];
        $detaiExport = DetailExport::where('id', $data['detailexport_id'])->first();
        if ($detaiExport) {
            $detaiExport->update([
                'status' => 2,
            ]);
        }
        $delivery = new Delivery($dataDelivery);
        $delivery->save();

        $deliveryId = $delivery->id;
        QuoteExport::where('detailexport_id', $data['detailexport_id'])
            ->update(['deliver_id' => $deliveryId]);

        //Thêm delivered
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            if (!empty($data['price_import'][$i])) {
                $priceImport = str_replace(',', '', $data['price_import'][$i]);
            } else {
                $priceImport = null;
            }
            if ($data['product_id'][$i] == null) {
                $dataProduct = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_guarantee' => 1,
                    'product_price_export' => $price,
                    'user_id' => Auth::user()->id,
                    'workspace_id' => Auth::user()->current_workspace,
                    'product_price_import' => isset($priceImport) ? $priceImport : 0,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                ];
                $product = new Products($dataProduct);
                $product->save();
            } else {
                $product = Products::where('id', $data['product_id'][$i])->first();
                if ($product) {
                    $product->save();
                }
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                    ->where('detailexport_id', $data['detailexport_id'])
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_delivery += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }
            //thêm giá xuất và thành tiền có thuế của mỗi sản phẩm giao
            $productExport = QuoteExport::where('detailexport_id', $data['detailexport_id'])
                ->where('product_id', $data['product_id'][$i])->first();
            if (!empty($data['product_price'][$i])) {
                $product_price = str_replace(',', '', $data['product_price'][$i]);
            } else {
                $product_price = null;
            }
            $priceTax = ($data['product_qty'][$i] * $product_price *  ($data['product_tax'][$i] == 99 ? 0 : $data['product_tax'][$i])) / 100;
            $tolTax = ($data['product_qty'][$i] * $product_price) + $priceTax;
            $dataDelivered = [
                'delivery_id' => $deliveryId,
                'product_id' => $data['product_id'][$i],
                'deliver_qty' => $data['product_qty'][$i],
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'price_export' => $product_price,
                'product_total_vat' => $tolTax,
                'user_id' => Auth::user()->id,
            ];
            $delivered_id = DB::table('delivered')->insertGetId($dataDelivered);

            $de = Delivered::where('delivery_id', $deliveryId)->first();
            $history_import = HistoryImport::where('product_id', $data['product_id'][$i])->first();
            // dd($history_import);
            // Add lịch sử giao dịch


            $htrImport = HistoryImport::where('product_id', $data['product_id'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->orderBy('id', 'ASC')
                ->get();
            // $check = false;
            $qty = 0;
            $count = 0;
            $temp = 0;
            if ($htrImport) {
                $check = false;
                $status = false;
                foreach ($htrImport as $va) {
                    // Lấy sản phẩm đã bán 
                    $getProductSell = History::where('history_import', $va->detailimport_id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->get();
                    foreach ($getProductSell as $item) {
                        $count += $item->qty_export;
                    }
                    if ($count == $va->product_qty) {
                        $qty += $va->product_qty;
                        continue;
                    } else {
                        $getHtr = History::where('history_import', $va->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->sum('qty_export');
                        $history = new History();
                        $dataHistory = [
                            'detailexport_id' => $data['detailexport_id'],
                            'delivered_id' => $delivered_id,
                            'provide_id' => $va->provide_id,
                            'detailimport_id' => $va->detailImport_id,
                            'tax_import' => $history_import ? $history_import->product_tax : null,
                            'price_import' => $history_import ? $history_import->price_export : null,
                            'total_import' => $history_import ? $history_import->product_total : null,
                            'history_import' => $va->id,
                            'workspace_id' => Auth::user()->current_workspace,
                            'user_id' => Auth::user()->id,
                            'product_id' => $va->product_id
                        ];

                        if ($va->product_qty == $getHtr) {
                            continue;
                        } else if ($va->product_qty > ($getHtr + $data['product_qty'][$i])) {
                            $dataHistory['qty_export'] = $data['product_qty'][$i];
                            $qty += $data['product_qty'][$i];
                        } else {
                            if ($getHtr == 0 && $getHtr != null) {
                                if ($va->product_qty == $data['product_qty'][$i]) {
                                    $dataHistory['qty_export'] = $data['product_qty'][$i];
                                    $qty += $data['product_qty'][$i];
                                } else if ($va->product_qty > $data['product_qty'][$i]) {
                                    $dataHistory['qty_export'] = $data['product_qty'][$i];
                                    $qty += $data['product_qty'][$i];
                                } else {
                                    if ($qty == 0) {
                                        if ($va->product_qty == $data['product_qty'][$i]) {
                                            $dataHistory['qty_export'] = $data['product_qty'][$i];
                                            $qty += $data['product_qty'][$i];
                                        } else if ($va->product_qty > $data['product_qty'][$i]) {
                                            $dataHistory['qty_export'] = $data['product_qty'][$i];
                                            $qty += $data['product_qty'][$i];
                                        } else {
                                            $dataHistory['qty_export'] = $va->product_qty;
                                            $qty += $va->product_qty;
                                        }
                                    } else {
                                        $dataHistory['qty_export'] = $data['product_qty'][$i] - $qty;
                                        $qty += $data['product_qty'][$i] - $qty;
                                    }
                                }
                            } else {
                                if ($getHtr == 0 && $getHtr != null) {
                                    if ($va->product_qty - $temp == $data['product_qty'][$i]) {
                                        $dataHistory['qty_export'] = $data['product_qty'][$i];
                                        $temp += $data['product_qty'][$i];
                                    } else if ($va->product_qty - $temp > $data['product_qty'][$i]) {
                                        $dataHistory['qty_export'] = $data['product_qty'][$i];
                                        $temp += $data['product_qty'][$i];
                                    } else {
                                        $dataHistory['qty_export'] = ($va->product_qty - $temp);
                                        $temp += ($va->product_qty - $temp);
                                    }
                                } else {
                                    if ($va->product_qty - $getHtr == $data['product_qty'][$i]) {
                                        $temp == 0 ? $dataHistory['qty_export'] = $data['product_qty'][$i] : $dataHistory['qty_export'] = $data['product_qty'][$i] - $temp;
                                        $temp += $temp == 0 ? $data['product_qty'][$i] : $data['product_qty'][$i] - $temp;
                                        $qty += $temp;
                                    } else if ($va->product_qty - $getHtr > $data['product_qty'][$i]) {
                                        $dataHistory['qty_export'] = $data['product_qty'][$i];
                                        $temp += $data['product_qty'][$i];
                                        $qty += $temp;
                                    } else {
                                        $dataHistory['qty_export'] = ($va->product_qty - $getHtr);
                                        $temp += ($va->product_qty - $getHtr);
                                        $qty += $temp;
                                    }
                                }
                            }
                        }
                        if (!$check) {
                            $history->addHistory($dataHistory);
                        }
                        if ($qty >= $data['product_qty'][$i]) {
                            $check = true;
                        }
                    }
                }


                // foreach ($htrImport as $va) {
                //     $getImportCurrent = History::where('history_import', $va->id)->latest()->first();
                //     $history = new History();
                //     $dataHistory = [
                //         'detailexport_id' => $data['detailexport_id'],
                //         'delivered_id' => $delivered_id,
                //         'provide_id' => $va->provide_id,
                //         // 'detailimport_id' => $history_import ? $history_import->detailImport_id : null,
                //         'detailimport_id' => $va->detailImport_id,
                //         'tax_import' => $history_import ? $history_import->product_tax : null,
                //         'price_import' => $history_import ? $history_import->price_export : null,
                //         'total_import' => $history_import ? $history_import->product_total : null,
                //         // 'history_import' => $history_import ? $history_import->id : null,
                //         'history_import' => $va->id,
                //         'workspace_id' => Auth::user()->current_workspace,
                //         'user_id' => Auth::user()->id,
                //         'product_id' => $va->product_id
                //     ];

                //     if ($getHtr == 0) {
                //         if ($va->product_qty >= $data['product_qty'][$i]) {
                //             $dataHistory['qty_export'] = $data['product_qty'][$i];
                //             $count += $data['product_qty'][$i];
                //         } else {
                //             $dataHistory['qty_export'] = $data['product_qty'][$i] - $va->product_qty;
                //             $count += $data['product_qty'][$i] - $va->product_qty;
                //         }
                //         if (!$check) {
                //             $history->addHistory($dataHistory);
                //             $temp++;
                //         }
                //         if ($count == $data['product_qty'][$i]) {
                //             $check = true;
                //         }
                //     } else {
                //         // dd($count);
                //         $qty += $va->product_qty;
                //         if ($qty > $getHtr) {
                //             // Tổng sản phẩm đơn đã bán
                //             $countExport = History::where('product_id', $va->product_id)
                //                 ->where('workspace_id', Auth::user()->current_workspace)
                //                 ->sum('qty_export');
                //             // var_dump($countExport);
                //             if (($va->product_qty - $countExport) > $data['product_qty'][$i]) {
                //                 $dataHistory['qty_export'] = $data['product_qty'][$i];
                //                 $count += $data['product_qty'][$i];
                //                 // dd($dataHistory);
                //             } else if ($va->product_qty - $countExport == 0) {
                //                 continue;
                //             } else {
                //                 // dd(2);
                //                 // $dataHistory['qty_export'] = ($va->product_qty - $countExport);
                //                 // $count += $va->product_qty - $countExport;
                //                 $dataHistory['qty_export'] = $data['product_qty'][$i] - $count;
                //                 // var_dump($dataHistory);
                //                 $count += ($data['product_qty'][$i] - $count);
                //                 // dd($count);
                //             }
                //             // var_dump($data['product_qty'][$i]);
                //             // var_dump("<br>");
                //             // var_dump($count);
                //             // dd($dataHistory);
                //             // dd($dataHistory);
                //             // var_dump($dataHistory);
                //             if (!$status) {
                //                 // dd($dataHistory);
                //                 $temp++;
                //                 $history->addHistory($dataHistory);
                //             }
                //             if ($count >= $data['product_qty'][$i]) {
                //                 $status = true;
                //             }
                //         } else if ($qty == $getHtr) {
                //             continue;
                //         } else {
                //             continue;
                //         }
                //     }







                //     // if ($getHtr == 0) {
                //     //     // var_dump("TH1");
                //     //     // dd(1);
                //     //     $history = new History();
                //     //     $dataHistory = [
                //     //         'detailexport_id' => $data['detailexport_id'],
                //     //         'delivered_id' => $delivered_id,
                //     //         'provide_id' => $va->provide_id,
                //     //         // 'detailimport_id' => $history_import ? $history_import->detailImport_id : null,
                //     //         'detailimport_id' => $va->detailImport_id,
                //     //         'tax_import' => $history_import ? $history_import->product_tax : null,
                //     //         'price_import' => $history_import ? $history_import->price_export : null,
                //     //         'total_import' => $history_import ? $history_import->product_total : null,
                //     //         // 'history_import' => $history_import ? $history_import->id : null,
                //     //         'history_import' => $va->id,
                //     //         'workspace_id' => Auth::user()->current_workspace,
                //     //         'user_id' => Auth::user()->id,
                //     //     ];
                //     //     if ($data['product_qty'][$i] != $qty) {
                //     //         // var_dump("TH2");
                //     //         // dd(1);
                //     //         if ($data['product_qty'][$i] > $va->product_qty) {
                //     //             // var_dump("TH3");
                //     //             // dd(1);
                //     //             $qty += $va->product_qty;
                //     //             if ($va->product_qty == $qty) {
                //     //                 $dataHistory['qty_export'] = $va->product_qty;
                //     //             }
                //     //             if ($qty > $va->product_qty) {
                //     //                 $dataHistory['qty_export'] = $qty - $va->product_qty;
                //     //             }
                //     //         } else {
                //     //             $dataHistory['qty_export'] = $data['product_qty'][$i];
                //     //             // var_dump("TH4");
                //     //             // dd(1);
                //     //         }
                //     //         $history->addHistory($dataHistory);
                //     //     }
                //     // } else {
                //     //     dd(123);
                //     //     foreach ($htrImport as $item) {
                //     //         $history = new History();

                //     //         // Lấy số lượng sản phẩm
                //     //         $qty += $item->product_qty;
                //     //         if ($qty > $getHtr) {
                //     //             // Tổng sản phẩm đơn đã bán
                //     //             $countExport = History::where('history_import', $item->id)
                //     //                 ->where('workspace_id', Auth::user()->current_workspace)
                //     //                 ->sum('qty_export');

                //     //             // dd($countExport);

                //     //             $getImportCurrent = History::where('history_import', $item->id)->latest()->first();
                //     //             if (($item->product_qty - $countExport) > $data['product_qty'][$i]) {
                //     //                 $dataHistory['qty_export'] = $data['product_qty'][$i];
                //     //             } else if ($item->product_qty - $countExport == 0) {
                //     //                 continue;
                //     //             } else {
                //     //                 $dataHistory['qty_export'] = ($item->product_qty - $countExport);
                //     //             }
                //     //             $history->addHistory($dataHistory);
                //     //         } else if ($qty == $getHtr) {
                //     //         } else {
                //     //         }
                //     //         // if ($qty < $getHtr) {
                //     //         //     if ($qty > $getHtr) {
                //     //         //         dd("abc");
                //     //         //         if ($ctn) {
                //     //         //             $dataHistory['qty_export'] = $getHtr - $item->product_qty;
                //     //         //             $history->addHistory($dataHistory);
                //     //         //         } else {
                //     //         //             if ($item->product_qty > $data['product_qty'][$i]) {
                //     //         //                 $dataHistory['qty_export'] = $data['product_qty'][$i];
                //     //         //             } else {
                //     //         //                 dd(1);
                //     //         //                 $dataHistory['qty_export'] = $qty - $getHtr;
                //     //         //             }
                //     //         //             // $dataHistory['qty_export'] = $qty - $getHtr;
                //     //         //             // $dataHistory['qty_export'] = $getHtr - $item->product_qty - $data['product_qty'][$i];
                //     //         //             $history->addHistory($dataHistory);
                //     //         //             $getHtr = $getHtr + $data['product_qty'][$i];
                //     //         //             $check = true;
                //     //         //         }
                //     //         //     } else if ($qty == $getHtr) {
                //     //         //         continue;
                //     //         //         // var_dump(123);
                //     //         //         // dd($item);
                //     //         //         // dd($item->product_qty);
                //     //         //         // $dataHistory['qty_export'] = $qty - $getHtr;
                //     //         //         // $history->addHistory($dataHistory);
                //     //         //     } else {
                //     //         //         var_dump('ãza');
                //     //         //         dd($item);
                //     //         //         if ($ctn) {
                //     //         //             $dataHistory['qty_export'] = $getHtr - $qty;
                //     //         //             $history->addHistory($dataHistory);
                //     //         //         } else {
                //     //         //             // $dataHistory['qty_export'] = $data['product_qty'][$i];
                //     //         //             // $history->addHistory($dataHistory);
                //     //         //             continue;
                //     //         //         }
                //     //         //     }
                //     //         //     if ($check) {
                //     //         //         $ctn = true;
                //     //         //     }
                //     //         // } else {
                //     //         //     if ($item->product_qty >= $data['product_qty'][$i]) {
                //     //         //         $dataHistory['qty_export'] = $data['product_qty'][$i];
                //     //         //         $history->addHistory($dataHistory);
                //     //         //     } else {
                //     //         //         continue;
                //     //         //     }

                //     //         //     // var_dump(123);
                //     //         //     // dd($item);
                //     //         //     // die();
                //     //         // }
                //     //     }
                //     // }
                // }
            }
            // dd(1);
            //thêm sản phẩm từ đơn giao hàng
            $checkProduct = Products::where('product_name', $data['product_name'][$i])->first();
            if (!$checkProduct) {
                $product = new Products($dataProduct);
                $product->save();
            }
            $delivery = Delivery::find($deliveryId);
            $checkQuote = QuoteExport::where('detailexport_id', $delivery->detailexport_id)
                ->where('product_id', $data['product_id'][$i])
                ->first();
            if ($delivery) {
                if (!$checkQuote) {
                    $dataQuote = [
                        'detailexport_id' => $delivery->detailexport_id,
                        'product_code' => $data['product_code'][$i],
                        'product_id' => $checkProduct == null ? $product->id : $checkProduct->id,
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $data['product_qty'][$i],
                        'product_tax' => 0,
                        'product_total' => 0,
                        'price_export' => 0,
                        'product_ratio' => 0,
                        'price_import' => 0,
                        'workspace_id' => Auth::user()->current_workspace,
                        'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'product_delivery' => $deliveryId,
                        'qty_delivery' => $data['product_qty'][$i],
                        'status' => 1,
                        'user_id' => Auth::user()->id,
                    ];
                    DB::table('quoteexport')->insert($dataQuote);
                }
            }
        }
        if (isset($data['selected_serial_numbers'])) {
            $selectedSerialNumbers = $data['selected_serial_numbers'];

            foreach ($selectedSerialNumbers as $serialNumberId) {
                $serialNumber = Serialnumber::find($serialNumberId);
                if ($serialNumber) {
                    $serialNumber->update([
                        'detailexport_id' => $data['detailexport_id'],
                        'status' => 2,
                        'delivery_id' => $deliveryId,
                    ]);
                }
            }
        }

        //xác nhận giao hàng
        $quoteExports = QuoteExport::where('detailexport_id', $data['detailexport_id'])
            ->where('status', 1)
            ->get();

        // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
        $hasNonZeroDifference = false;

        foreach ($quoteExports as $quoteExport) {
            $product_id = $quoteExport->product_id;

            // Lấy tất cả các bản ghi delivered có product_id tương ứng và status = 2 từ bảng Delivery
            $deliveriesForProduct = Delivered::join('delivery', 'delivery.id', '=', 'delivered.delivery_id')
                ->where('delivery.detailexport_id', $data['detailexport_id'])
                ->where('delivered.product_id', $product_id)
                ->where('delivery.workspace_id', Auth::user()->current_workspace)
                ->where('delivery.status', 2)
                ->get();

            // Tính tổng deliver_qty
            $totalDeliveredQty = $deliveriesForProduct->sum('deliver_qty');
            $productQty = bcsub($quoteExport->product_qty, '0', 4);

            // So sánh tổng deliver_qty với product_qty
            if (bccomp($totalDeliveredQty, $productQty, 4) !== 0) {
                $hasNonZeroDifference = true;
                break;
            }
        }

        $detailExport = DetailExport::where('id', $data['detailexport_id'])->first();

        if ($detailExport) {
            if ($hasNonZeroDifference) {
                $detailExport->update([
                    'status_receive' => 3,
                ]);
            } else {
                $detailExport->update([
                    'status_receive' => 2,
                ]);
                if ($detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
                    $detailExport->update([
                        'status' => 3,
                    ]);
                }
            }
        }
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product = Products::find($data['product_id'][$i]);
            if ($product) {
                if ($product->type != 2) {
                    $result = ($product->product_inventory == null ? 0 : $product->product_inventory) - $data['product_qty'][$i];
                    $product->update([
                        'product_inventory' => $result,
                    ]);
                }
            }
        }
    }
    public function getUserInDelivery()
    {
        $delivery = Delivery::leftJoin('delivered', 'delivered.delivery_id', 'delivery.id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->leftJoin('users', 'users.id', 'delivery.user_id')->distinct('guest.id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->select(
                'delivery.id as maGiaoHang',
                'delivery.created_at as ngayGiao',
                'delivery.code_delivery as code_delivery',
                'delivery.*',
                'users.*'
            )->get();
        return $delivery;
    }
    public function code_deliveryById($data)
    {
        $delivery = DB::table($this->table);
        if (isset($data)) {
            $delivery = $delivery->whereIn('id', $data);
        }
        $delivery = $delivery->pluck('code_delivery')->all();
        return $delivery;
    }
    public function ajax($data)
    {
        $delivery = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->select(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'delivery.id as maGiaoHang',
                'delivery.created_at as ngayGiao',
                'delivery.status as trangThai',
                'users.name',
                'detailexport.guest_name',
                DB::raw('(SELECT COALESCE(SUM(product_total_vat), 0) FROM delivered WHERE delivery_id = delivery.id) as totalProductVat')
            )
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->groupBy(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'users.name',
                'delivery.created_at',
                'delivery.status',
                'detailexport.guest_name'
            );
        if (isset($data['search'])) {
            $delivery = $delivery->where(function ($query) use ($data) {
                $query->orWhere('code_delivery', 'like', '%' . $data['search'] . '%');
                $query->orWhere('delivery.quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailexport.guest_name', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['quotenumber'])) {
            $delivery = $delivery->where('delivery.quotation_number', 'like', '%' . $data['quotenumber'] . '%');
        }
        if (isset($data['guests'])) {
            $delivery = $delivery->where('detailexport.guest_name', 'like', '%' . $data['guests'] . '%');
        }
        if (isset($data['shipping_unit'])) {
            $delivery = $delivery->where('delivery.shipping_unit', 'like', '%' . $data['shipping_unit'] . '%');
        }
        if (isset($data['code_delivery'])) {
            $delivery = $delivery->whereIn('delivery.id', $data['code_delivery']);
        }
        if (isset($data['users'])) {
            $delivery = $delivery->whereIn('delivery.user_id', $data['users']);
        }
        if (isset($data['status'])) {
            $delivery = $delivery->whereIn('delivery.status', $data['status']);
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $delivery = $delivery->whereBetween('delivery.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['shipping_fee'][0]) && isset($data['shipping_fee'][1])) {
            $delivery = $delivery->where('delivery.shipping_fee', $data['shipping_fee'][0], $data['shipping_fee'][1]);
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $delivery = $delivery->having('totalProductVat', $data['total'][0], $data['total'][1]);
        }

        if (isset($data['sort']) && isset($data['sort'][0])) {
            $delivery = $delivery->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $delivery = $delivery->get();
        // dd($delivery);
        return $delivery;
    }
}
