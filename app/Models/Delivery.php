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
        'updated_at',
        'promotion',
        'totalVat',
        'manager_warehouse',
        'id_sale',
        'fullname',
        'address',
        'phone',
        'note'
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

    public function listDelivery()
    {
        $listDetail = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
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
                'delivery.promotion',
                'guest.guest_name_display as nameGuest',
                'delivery.totalVAT as totalVAT',
                DB::raw('(
                    SELECT 
                        CASE 
                            WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
                                CASE 
                                    WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
                                        (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm số tiền trực tiếp và áp dụng thuế
                                    WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
                                        ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm phần trăm trên tổng giá trị sản phẩm và áp dụng thuế
                                    ELSE 
                                        COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                                END
                            ELSE
                                COALESCE(SUM(product_total_vat), 0) -- Giá trị ban đầu nếu $.value = 0
                        END
                    FROM delivered 
                    LEFT JOIN products ON delivered.product_id = products.id
                    WHERE delivered.delivery_id = delivery.id
                ) as totalProductVat')
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
                'detailexport.guest_name',
                'delivery.totalVAT',
                'guest.guest_name_display',
                'delivery.promotion',
            )
            ->orderBy('delivery.id', 'desc');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $listDetail->where('delivery.user_id', Auth::user()->id);
            }
        }
        $listDetail = $listDetail->get();
        return $listDetail;
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
        $promotion = [
            'type' => $data['promotion-option-total'],
            'value' => isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0,
        ];
        $dataDelivery = [
            'guest_id' => $data['guest_id'],
            'quotation_number' => $data['quotation_number'] ?? '',
            // 'code_delivery' => $data['code_delivery'],
            // 'shipping_unit' => $shipping_unit,
            // 'shipping_fee' => $shipping_fee,
            'detailexport_id' => $data['detailexport_id'] ?? 0,
            'status' => 1,
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => $date_deliver == null ? now() : $date_deliver,
            'user_id' => Auth::user()->id,
            'promotion' => json_encode($promotion),
            'totalVat' => $data['totalValue'],
            'manager_warehouse' => $data['manager_warehouse'],
            'id_sale' => Auth::user()->id,
            'fullname' => $data['fullname'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'note' => $data['note'],
        ];
        $delivery = new Delivery($dataDelivery);
        $delivery->save();

        $detailexportId = $delivery->id;
        QuoteExport::where('detailexport_id', $data['detailexport_id'])
            ->update(['deliver_id' => $detailexportId]);
        //Cập nhật
        $detaiExport = DetailExport::where('id', $data['detailexport_id'])->first();
        $deliveredCount2 = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->where('delivery.status', 2)
            ->count();
        if ($detaiExport) {
            $detaiExport->update([
                'status_receive' => 1,
            ]);
            if ($deliveredCount2 > 0) {
                $detaiExport->update([
                    'status_receive' => 3,
                ]);
            }
        }
        return $delivery->id;
    }
    public function getDeliveryToId($id)
    {
        $delivery = Delivery::where('delivery.id', $id)
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'delivery.guest_id', 'guest.id')
            ->leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->leftJoin('represent_guest', 'detailexport.represent_id', 'represent_guest.id')
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->select(
                '*',
                'delivery.id as soGiaoHang',
                'delivery.status as tinhTrang',
                'delivery.created_at as ngayGiao',
                'delivery.promotion as promotion_delivery',
                'delivery.guest_id as guest_id',
                'delivery.note as ghiChu'
            )
            ->first();
        return $delivery;
    }
    public function getProductToId($id)
    {
        $product = Delivery::join('quoteexport', 'delivery.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('warehouse', 'warehouse.id', '=', 'quoteexport.warehouse_id')
            ->leftJoin('productwarehouse', function ($join) {
                $join->on('productwarehouse.product_id', 'quoteexport.product_id')
                    ->on('productwarehouse.warehouse_id', 'quoteexport.warehouse_id');
            })
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
                'delivered.promotion',
                'delivered.promotion_qty',
                'delivery.created_at as ngayGiao',
                'products.type',
                'products.check_seri',
                'warehouse.warehouse_name as nameWH',
                'warehouse.id as idWH',
                'productwarehouse.qty as tonkho',
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
                'delivered.promotion',
                'delivered.promotion_qty',
                'delivery.created_at',
                'products.type',
                'products.check_seri',
                'warehouse.warehouse_name',
                'warehouse.id',
                'productwarehouse.qty',
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

        //Cập nhật trạng thái giao hàng
        $firstDetailExportId = DetailExport::where('guest_id', $delivery->guest_id)
            ->where('detailexport.status_receive', '!=', 2)
            ->orderBy('created_at', 'asc')
            ->value('id');

        if ($firstDetailExportId) {
            $quoteExports = QuoteExport::leftJoin('detailexport', 'quoteexport.detailexport_id', 'detailexport.id')
                ->where('detailexport.status_receive', '!=', 2)
                ->where('quoteexport.status', 1)
                ->where('quoteexport.detailexport_id', '!=', 0)
                ->where('quoteexport.detailexport_id', $firstDetailExportId)
                ->where('detailexport.guest_id', $delivery->guest_id)
                ->get();

            // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
            $hasNonZeroDifference = false;

            foreach ($quoteExports as $quoteExport) {
                $product_id = $quoteExport->product_id;

                $lastDeliveryId = Delivery::where('guest_id', $delivery->guest_id)
                    ->where('status', 2)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->orderBy('created_at', 'desc')
                    ->value('id');
                // Lấy tất cả các bản ghi delivered có product_id tương ứng và status = 2 từ bảng Delivery
                if ($lastDeliveryId) {
                    $deliveriesForProduct = Delivered::where('delivery_id', $lastDeliveryId)
                        ->where('product_id', $product_id)
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
            }
            $detailExport = DetailExport::where('id', $firstDetailExportId)->first();

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
        }

        // Kiểm tra trạng thái SN
        $checkSN = false;
        $id_history = [];
        // dd($data);
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $productWh = ProductWarehouse::where('product_id', $data['product_id'][$i])->where('warehouse_id', $data['warehouse_id'][$i])->first();
            $product = Products::find($data['product_id'][$i]);
            if ($productWh) {
                if ($product->type != 2) {
                    $result = $productWh->qty - ($data['product_qty'][$i] + ($data['promotion_qty'][$i] == null ? 0 : $data['promotion_qty'][$i]));
                    $productWh->update([
                        'qty' => $result,
                    ]);
                }
            }
            if ($product) {
                $getDelivered_id = Delivered::where('delivery_id', $delivery->id)
                    ->where('product_id', $product->id)
                    ->first();
                if ($product->type == 2) {
                    $history = new History();
                    $dataHistory = [
                        'detailexport_id' => $data['detailexport_id'] ?? 0,
                        'delivered_id' => isset($getDelivered_id) ? $getDelivered_id->id : 0,
                        'provide_id' => 0,
                        'detailimport_id' => 0,
                        'tax_import' => $product->product_tax,
                        'price_import' => 0,
                        'total_import' => 0,
                        'history_import' => 0,
                        'workspace_id' => Auth::user()->current_workspace,
                        'user_id' => Auth::user()->id,
                        'product_id' => $product->id,
                        'qty_export' => $data['product_qty'][$i],
                        'delivery_id' => isset($delivery) ? $delivery->id : 0
                    ];
                    $history->addHistory($dataHistory);
                } else {
                    if ($product->check_seri == 0) {
                        $history_import = QuoteImport::where('product_id', $data['product_id'][$i])
                            ->first();
                        $htrImport = QuoteImport::where('product_id', $data['product_id'][$i])
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->orderBy('id', 'ASC')
                            ->get();
                        $qty = 0;
                        // $count = $data['product_qty'][$i];
                        $temp = 0;
                        $count_export = 0;
                        $check = false;
                        if ($htrImport) {
                            foreach ($htrImport as $value) {
                                $history = new History();
                                $dataHistory = [
                                    'detailexport_id' => $data['detailexport_id'],
                                    'delivered_id' => isset($getDelivered_id) ? $getDelivered_id->id : 0,
                                    'provide_id' => isset($value->getQuoteNumber) ? $value->getQuoteNumber->provide_id : 0,
                                    'detailimport_id' => $value->detailimport_id,
                                    'tax_import' => $value->product_tax,
                                    'price_import' => $value->price_export,
                                    'total_import' => $value->product_total,
                                    'history_import' => $value->id,
                                    'workspace_id' => Auth::user()->current_workspace,
                                    'user_id' => Auth::user()->id,
                                    'product_id' => $value->product_id,
                                    'delivery_id' => isset($delivery) ? $delivery->id : 0
                                ];
                                // Lấy số lượng sản phẩm đã bán
                                $getHtr = History::where('product_id', $value->product_id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->sum('qty_export');
                                // Tính tổng số lượng sản phẩm bán
                                $qty += $value->product_qty;
                                if ($qty < $data['product_qty'][$i] && $getHtr == 0) {
                                    $count_export = $temp == 0 ? $value->product_qty : $data['product_qty'][$i] - $temp;
                                    $temp += $count_export;
                                } else {
                                    if ($qty < $getHtr) {
                                        // Lấy thêm số lượng sản phẩm
                                        continue;
                                    } else {
                                        if ($getHtr > 0) {
                                            // Lấy số lượng sản phẩm đã bán tại vị trí hiện tại
                                            $curremt_export = History::where('history_import', $value->id)
                                                ->where('product_id', $value->product_id)
                                                ->where('workspace_id', Auth::user()->current_workspace)
                                                ->sum('qty_export');
                                            // ->first();
                                            if ($curremt_export) {
                                                $remaining_amount = $value->product_qty - $curremt_export;
                                                if ($temp > 0) {
                                                    if ($remaining_amount == $data['product_qty'][$i] - $temp) {
                                                        $count_export = $data['product_qty'][$i] - $temp;
                                                    } elseif ($remaining_amount > $data['product_qty'][$i] - $temp) {
                                                        $count_export = $data['product_qty'][$i] - $temp;
                                                    } else {
                                                        $count_export = $value->product_qty - $remaining_amount;
                                                    }
                                                } else {
                                                    if ($remaining_amount == 0) {
                                                        continue;
                                                    } else {
                                                        if ($remaining_amount == $data['product_qty'][$i]) {
                                                            $count_export = $data['product_qty'][$i];
                                                            var_dump("TH1");
                                                        } elseif ($remaining_amount > $data['product_qty'][$i]) {
                                                            $count_export = $data['product_qty'][$i];
                                                            var_dump("TH2");
                                                        } else {
                                                            $count_export = $value->product_qty - $remaining_amount;
                                                            var_dump("TH3");
                                                        }
                                                    }
                                                }
                                            } else {
                                                if ($temp > 0) {
                                                    if ($value->product_qty == $data['product_qty'][$i] - $temp) {
                                                        $count_export = $value->product_qty;
                                                    } else if ($value->product_qty > $data['product_qty'][$i] - $temp) {
                                                        $count_export = $data['product_qty'][$i] - $temp;
                                                    } else {
                                                        $count_export = $value->product_qty;
                                                    }
                                                } else {
                                                    if ($value->product_qty == $data['product_qty'][$i]) {
                                                        $count_export = $data['product_qty'][$i];
                                                        var_dump("TH4");
                                                    } elseif ($value->product_qty > $data['product_qty'][$i]) {
                                                        $count_export = $data['product_qty'][$i];
                                                        var_dump("TH5");
                                                    } else {
                                                        // $count_export = $temp == 0 ? $value->product_qty : ($data['product_qty'][$i] - $value->product_qty < $data['product_qty'][$i] ? $data['product_qty'][$i] - $value->product_qty - $temp : $data['product_qty'][$i] - $temp);
                                                        $count_export = $value->product_qty;
                                                        var_dump("TH6.1");
                                                    }
                                                }
                                            }
                                            $temp += $count_export;
                                        } else {
                                            if ($temp > 0) {
                                                if ($value->product_qty == $data['product_qty'][$i] - $temp) {
                                                    $count_export = $data['product_qty'][$i] - $temp;
                                                } elseif ($value->product_qty > $data['product_qty'][$i] - $temp) {
                                                    $count_export = $data['product_qty'][$i] - $temp;
                                                } else {
                                                    $count_export = $value->product_qty;
                                                }
                                            } else {
                                                if ($value->product_qty == $data['product_qty'][$i]) {
                                                    $count_export = $temp == 0 ? $data['product_qty'][$i] : $data['product_qty'][$i] - $temp;
                                                    var_dump("TH44");
                                                } elseif ($value->product_qty > $data['product_qty'][$i]) {
                                                    $count_export = $temp == 0 ? $value->product_qty - $data['product_qty'][$i] : $data['product_qty'][$i] - $temp;
                                                    var_dump("TH55");
                                                } else {
                                                    $count_export = $temp == 0 ? $value->product_qty : ($data['product_qty'][$i] - $value->product_qty);
                                                    // - $temp > 0 ? $data['product_qty'][$i] - $value->product_qty - $temp : $value->product_qty);
                                                    var_dump("TH66");
                                                }
                                            }
                                            $temp += $count_export;
                                        }
                                    }
                                }
                                $dataHistory['qty_export'] = $count_export;
                                if (!$check) {
                                    $history->addHistory($dataHistory);
                                }
                                if ($temp == $data['product_qty'][$i]) {
                                    $check = true;
                                }
                            }
                        }
                    } else {
                        if (isset($data['id_seri']) && !$checkSN) {
                            $selectedSerialNumbers = $data['id_seri'];
                            $result = Serialnumber::whereIn('id', $selectedSerialNumbers)
                                ->select('detailimport_id', 'product_id', Serialnumber::raw('COUNT(id) AS count_serial_numbers'))
                                ->groupBy('detailimport_id', 'product_id')
                                ->get();
                            foreach ($result as $value) {
                                $history_import = QuoteImport::where('product_id', $value->product_id)
                                    ->where('detailimport_id', $value->detailimport_id)->first();
                                $history = new History();
                                $dataHistory = [
                                    'detailexport_id' => $data['detailexport_id'],
                                    'delivered_id' => isset($getDelivered_id) ? $getDelivered_id->id : 0,
                                    'detailimport_id' => $value->detailimport_id,
                                    'provide_id' => isset($value->getDetailImport) ? $value->getDetailImport->provide_id : 0,
                                    'tax_import' => $history_import ? $history_import->product_tax : null,
                                    'price_import' => $history_import ? $history_import->price_export : null,
                                    'total_import' => $history_import ? $history_import->product_total : null,
                                    'history_import' =>  $history_import ? $history_import->id : 0,
                                    'workspace_id' => Auth::user()->current_workspace,
                                    'user_id' => Auth::user()->id,
                                    'product_id' => $value->product_id,
                                    'qty_export' => $value->count_serial_numbers,
                                    'delivery_id' => isset($delivery) ? $delivery->id : 0
                                ];
                                $id_H = $history->addHistory($dataHistory);
                                array_push($id_history, $id_H->id);
                            }
                            $checkSN = true;
                        }
                    }
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

        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product = Products::find($data['product_id'][$i]);
            if ($product) {
                // Cập nhật delivered_id nếu có SN
                $deliveredList = Delivered::where('delivery_id', $delivery->id)->where('product_id', $product->id)
                    ->get();
                if ($deliveredList) {
                    foreach ($deliveredList as $item) {
                        History::whereIn('id', $id_history)->where('delivery_id', $item->delivery_id)->where('product_id', $item->product_id)->update([
                            'delivered_id' => $item->id
                        ]);
                    }
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
            History::where('delivery_id', $delivery->id)->delete();
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
        $deliveredCount2 = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->where('delivery.status', 2)
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
            if ($deliveredCount2 > 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 2,
                    ]);
            }
            if ($deliveredCount > 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 2,
                    ]);
            } else {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 1,
                    ]);
            }
        }
        //Cập nhật
        if ($deliveredCount == 0) {
            DetailExport::where('id', $delivery->detailexport_id)
                ->update([
                    'status_receive' => 0,
                ]);
        }
        QuoteExport::where('product_delivery', $id)->delete();
        Delivery::find($id)->delete();
    }
    public function deleteDeliveryItem($id)
    {
        $delivery = Delivery::find($id);
        if ($delivery) {
            History::where('delivery_id', $delivery->id)->delete();
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
            $deliveredItems = QuoteExport::where('deliver_id', $id)->get();
            foreach ($deliveredItems as $deliveredItem) {
                $product = ProductWarehouse::where('product_id', $deliveredItem->product_id)->where('warehouse_id', $deliveredItem->warehouse_id)->first();
                if ($product) {
                    if ($product->type != 2) {
                        $product->qty += $deliveredItem->product_qty;
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
        $deliveredCount2 = Delivered::where('delivery.detailexport_id', $delivery->detailexport_id)
            ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->where('delivery.status', 2)
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
            if ($deliveredCount2 > 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 2,
                    ]);
            }
            if ($PayCount > 0) {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 2,
                    ]);
            } else {
                DetailExport::where('id', $delivery->detailexport_id)
                    ->update([
                        'status' => 1,
                    ]);
            }
        }
        //Cập nhật
        if ($deliveredCount == 0) {
            DetailExport::where('id', $delivery->detailexport_id)
                ->update([
                    'status_receive' => 0,
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
        $promotion = [
            'type' => $data['promotion-option-total'],
            'value' => isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0,
        ];
        $dataDelivery = [
            'guest_id' => $data['guest_id'],
            'user_id' => Auth::user()->id,
            'quotation_number' => $data['quotation_number'] ?? '',
            'code_delivery' => $data['code_delivery'],
            'shipping_unit' => $shipping_unit,
            'shipping_fee' => $shipping_fee,
            'detailexport_id' => $data['detailexport_id'] ?? 0,
            'workspace_id' => Auth::user()->current_workspace,
            'status' => 2,
            'created_at' => $date_deliver,
            'promotion' => json_encode($promotion),
            'totalVat' => $data['totalValue'],
            'manager_warehouse' => $data['manager_warehouse'],
            'id_sale' => Auth::user()->id,
            'fullname' => $data['fullname'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'note' => $data['note'],
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
        // Kiểm tra SN đã được thêm 
        $checkSN = false;
        $id_history = [];
        //Thêm delivered
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i] ?? '0');
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
                    ->where('status', 1)
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_delivery += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }
            //thêm giá xuất và thành tiền có thuế của mỗi sản phẩm giao
            if (isset($data['detailexport_id'])) {
                $productExport = QuoteExport::where('detailexport_id', $data['detailexport_id'])
                    ->where('product_id', $data['product_id'][$i])->first();
                $productExport->warehouse_id = isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 0;
                $productExport->save();
            }

            if (!empty($data['product_price'][$i])) {
                $product_price = str_replace(',', '', $data['product_price'][$i]);
            } else {
                $product_price = null;
            }
            $promotionValue = str_replace(',', '', $data['discount_input'][$i] ?? 0);
            $promotion_product = [
                'type' => $data['discount_option'][$i] ?? 0,
                'value' => $promotionValue,
            ];

            // Tính giảm giá
            if ($promotion_product['type'] == 1) { // Giảm số tiền trực tiếp
                $discountAmount = (float)$promotion_product['value'];
            } elseif ($promotion_product['type'] == 2) { // Giảm phần trăm trên giá trị sản phẩm
                $discountAmount = ($data['product_qty'][$i] * $product_price * (float)$promotion_product['value']) / 100;
            } else {
                $discountAmount = 0; // Không có giảm giá
            }

            // Tính tổng tiền hàng sau giảm giá
            $totalPrice = $data['product_qty'][$i] * $product_price;
            $totalPriceAfterDiscount = $totalPrice - $discountAmount;

            // Tính thuế
            if (isset($data['product_tax'][$i])) {
                $taxRate = $data['product_tax'][$i] == 99 ? 0 : $data['product_tax'][$i];
                $priceTax = ($totalPriceAfterDiscount * $taxRate) / 100;
            } else {
                // Nếu phần tử không tồn tại, xử lý giá trị mặc định
                $priceTax = 0;
            }
            $promotionTotal = [
                'type' => $data['promotion-option-total'],
                'value' => isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0,
            ];
            if ($promotionTotal['value'] != 0) {
                $tolTax = $totalPriceAfterDiscount;
            } else {
                $tolTax = $totalPriceAfterDiscount + $priceTax;
            }
            // dd($data);

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
                'promotion' => json_encode($promotion_product),
                'promotion_qty' => $data['promotion_qty'][$i],
            ];
            $delivered_id = DB::table('delivered')->insertGetId($dataDelivered);
            $de = Delivered::where('delivery_id', $deliveryId)->first();
            $product = Products::where('product_name', $data['product_name'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)->first();
            if ($product) {
                if ($product->type == 2) {
                    $history = new History();
                    $dataHistory = [
                        'detailexport_id' => $data['detailexport_id'],
                        'delivered_id' => $delivered_id,
                        'provide_id' => 0,
                        'detailimport_id' => 0,
                        'tax_import' => $product->product_tax,
                        'price_import' => 0,
                        'total_import' => 0,
                        'history_import' => 0,
                        'workspace_id' => Auth::user()->current_workspace,
                        'user_id' => Auth::user()->id,
                        'product_id' => $product->id,
                        'qty_export' => $data['product_qty'][$i],
                        'delivery_id' => $delivery->id
                    ];
                    $history->addHistory($dataHistory);
                } else {
                    if ($product->check_seri == 0) {
                        $history_import = QuoteImport::where('product_id', $data['product_id'][$i])
                            ->first();
                        $htrImport = QuoteImport::where('product_id', $data['product_id'][$i])
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->orderBy('id', 'ASC')
                            ->get();
                        $qty = 0;
                        // $count = $data['product_qty'][$i];
                        $temp = 0;
                        $count_export = 0;
                        $check = false;
                        if ($htrImport) {
                            foreach ($htrImport as $value) {
                                $history = new History();
                                $dataHistory = [
                                    'detailexport_id' => $data['detailexport_id'],
                                    'delivered_id' => $delivered_id,
                                    'provide_id' => isset($value->getQuoteNumber) ? $value->getQuoteNumber->provide_id : 0,
                                    'detailimport_id' => $value->detailimport_id,
                                    'tax_import' => $value->product_tax,
                                    'price_import' => $value->price_export,
                                    'total_import' => $value->product_total,
                                    'history_import' => $value->id,
                                    'workspace_id' => Auth::user()->current_workspace,
                                    'user_id' => Auth::user()->id,
                                    'product_id' => $value->product_id,
                                    'delivery_id' => $delivery->id
                                ];
                                // Lấy số lượng sản phẩm đã bán
                                $getHtr = History::where('product_id', $value->product_id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->sum('qty_export');
                                // Tính tổng số lượng sản phẩm bán
                                $qty += $value->product_qty;
                                if ($qty < $data['product_qty'][$i] && $getHtr == 0) {
                                    $count_export = $temp == 0 ? $value->product_qty : $data['product_qty'][$i] - $temp;
                                    $temp += $count_export;
                                } else {
                                    if ($qty < $getHtr) {
                                        // Lấy thêm số lượng sản phẩm
                                        continue;
                                    } else {
                                        if ($getHtr > 0) {
                                            // Lấy số lượng sản phẩm đã bán tại vị trí hiện tại
                                            $curremt_export = History::where('history_import', $value->id)
                                                ->where('product_id', $value->product_id)
                                                ->where('workspace_id', Auth::user()->current_workspace)
                                                ->sum('qty_export');
                                            // ->first();
                                            if ($curremt_export) {
                                                $remaining_amount = $value->product_qty - $curremt_export;
                                                if ($temp > 0) {
                                                    if ($remaining_amount == $data['product_qty'][$i] - $temp) {
                                                        $count_export = $data['product_qty'][$i] - $temp;
                                                    } elseif ($remaining_amount > $data['product_qty'][$i] - $temp) {
                                                        $count_export = $data['product_qty'][$i] - $temp;
                                                    } else {
                                                        $count_export = $value->product_qty - $remaining_amount;
                                                    }
                                                } else {
                                                    if ($remaining_amount == 0) {
                                                        continue;
                                                    } else {
                                                        if ($remaining_amount == $data['product_qty'][$i]) {
                                                            $count_export = $data['product_qty'][$i];
                                                            var_dump("TH1");
                                                        } elseif ($remaining_amount > $data['product_qty'][$i]) {
                                                            $count_export = $data['product_qty'][$i];
                                                            var_dump("TH2");
                                                        } else {
                                                            $count_export = $value->product_qty - $remaining_amount;
                                                            var_dump("TH3");
                                                        }
                                                    }
                                                }
                                            } else {
                                                if ($temp > 0) {
                                                    if ($value->product_qty == $data['product_qty'][$i] - $temp) {
                                                        $count_export = $value->product_qty;
                                                    } else if ($value->product_qty > $data['product_qty'][$i] - $temp) {
                                                        $count_export = $data['product_qty'][$i] - $temp;
                                                    } else {
                                                        $count_export = $value->product_qty;
                                                    }
                                                } else {
                                                    if ($value->product_qty == $data['product_qty'][$i]) {
                                                        $count_export = $data['product_qty'][$i];
                                                        var_dump("TH4");
                                                    } elseif ($value->product_qty > $data['product_qty'][$i]) {
                                                        $count_export = $data['product_qty'][$i];
                                                        var_dump("TH5");
                                                    } else {
                                                        // $count_export = $temp == 0 ? $value->product_qty : ($data['product_qty'][$i] - $value->product_qty < $data['product_qty'][$i] ? $data['product_qty'][$i] - $value->product_qty - $temp : $data['product_qty'][$i] - $temp);
                                                        $count_export = $value->product_qty;
                                                        var_dump("TH6.1");
                                                    }
                                                }
                                            }
                                            $temp += $count_export;
                                        } else {
                                            if ($temp > 0) {
                                                if ($value->product_qty == $data['product_qty'][$i] - $temp) {
                                                    $count_export = $data['product_qty'][$i] - $temp;
                                                    var_dump("TH5.1");
                                                } elseif ($value->product_qty > $data['product_qty'][$i] - $temp) {
                                                    $count_export = $data['product_qty'][$i] - $temp;
                                                    var_dump("TH5.1");
                                                } else {
                                                    $count_export = $value->product_qty;
                                                    var_dump("TH5.1");
                                                }
                                            } else {
                                                if ($value->product_qty == $data['product_qty'][$i]) {
                                                    $count_export = $temp == 0 ? $data['product_qty'][$i] : $data['product_qty'][$i] - $temp;
                                                    var_dump("TH6.1");
                                                } elseif ($value->product_qty > $data['product_qty'][$i]) {
                                                    $count_export = $temp == 0 ? $value->product_qty - $data['product_qty'][$i] : $data['product_qty'][$i] - $temp;
                                                    var_dump("TH6.2");
                                                } else {
                                                    $count_export = $temp == 0 ? $value->product_qty : ($data['product_qty'][$i] - $value->product_qty);
                                                    // - $temp > 0 ? $data['product_qty'][$i] - $value->product_qty - $temp : $value->product_qty);
                                                    var_dump("TH6.3");
                                                }
                                            }
                                            $temp += $count_export;
                                        }
                                    }
                                }
                                $dataHistory['qty_export'] = $count_export;
                                if (!$check) {
                                    $history->addHistory($dataHistory);
                                }
                                if ($temp == $data['product_qty'][$i]) {
                                    $check = true;
                                }
                            }
                        }
                    } else {
                        if (isset($data['selected_serial_numbers']) && !$checkSN) {
                            $selectedSerialNumbers = $data['selected_serial_numbers'];
                            $result = Serialnumber::whereIn('id', $selectedSerialNumbers)
                                ->select('detailimport_id', 'product_id', Serialnumber::raw('COUNT(id) AS count_serial_numbers'))
                                ->groupBy('detailimport_id', 'product_id')
                                ->get();

                            foreach ($result as $value) {
                                $history_import = QuoteImport::where('product_id', $value->product_id)
                                    ->where('detailimport_id', $value->detailimport_id)->first();
                                $history = new History();
                                $dataHistory = [
                                    'detailexport_id' => $data['detailexport_id'],
                                    'delivered_id' => $delivered_id,
                                    'detailimport_id' => $value->detailimport_id,
                                    'provide_id' => isset($value->getDetailImport) ? $value->getDetailImport->provide_id : 0,
                                    'tax_import' => $history_import ? $history_import->product_tax : null,
                                    'price_import' => $history_import ? $history_import->price_export : null,
                                    'total_import' => $history_import ? $history_import->product_total : null,
                                    'history_import' =>  $history_import ? $history_import->id : 0,
                                    'workspace_id' => Auth::user()->current_workspace,
                                    'user_id' => Auth::user()->id,
                                    'product_id' => $value->product_id,
                                    'qty_export' => $value->count_serial_numbers,
                                    'delivery_id' => $delivery->id
                                ];
                                $id_H = $history->addHistory($dataHistory);
                                array_push($id_history, $id_H->id);
                            }
                            // Cập nhật trạng thái SN
                            $checkSN = true;
                        }
                    }
                }
            }

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
                    // dd($data);
                    $dataQuote = [
                        'detailexport_id' => isset($delivery->detailexport_id) ? $delivery->detailexport_id : 0,
                        'product_code' => $data['product_code'][$i] ?? null,
                        'product_id' => $checkProduct == null ? $product->id : $checkProduct->id,
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $data['product_qty'][$i],
                        'product_tax' => $data['product_tax'][$i] ?? 0,
                        'product_total' => (str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['product_price'][$i] ?? 0)),
                        'price_export' => str_replace(',', '', $data['product_price'][$i] ?? 0),
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
                        'promotion' => json_encode($promotion_product),
                        'warehouse_id' => isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 0,
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
                        'detailexport_id' => $data['detailexport_id'] ?? 0,
                        'status' => 2,
                        'delivery_id' => $deliveryId,
                    ]);
                }
            }
        }

        //xác nhận giao hàng
        $firstDetailExportId = DetailExport::where('guest_id', $data['guest_id'])
            ->where('detailexport.status_receive', '!=', 2)
            ->orderBy('created_at', 'asc')
            ->value('id');
        if ($firstDetailExportId) {
            $quoteExports = QuoteExport::leftJoin('detailexport', 'quoteexport.detailexport_id', 'detailexport.id')
                ->where('detailexport.status_receive', '!=', 2)
                ->where('quoteexport.status', 1)
                ->where('quoteexport.detailexport_id', '!=', 0)
                ->where('quoteexport.detailexport_id', $firstDetailExportId)
                ->where('detailexport.guest_id', $data['guest_id'])
                ->get();
            // Biến để kiểm tra xem có ít nhất một giá trị nào lớn hơn 0 không
            $hasNonZeroDifference = false;

            foreach ($quoteExports as $quoteExport) {
                $product_id = $quoteExport->product_id;

                $lastDeliveryId = Delivery::where('guest_id', $data['guest_id'])
                    ->where('status', 2)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->orderBy('created_at', 'desc')
                    ->value('id');
                // Lấy tất cả các bản ghi delivered có product_id tương ứng và status = 2 từ bảng Delivery
                if ($lastDeliveryId) {
                    $deliveriesForProduct = Delivered::where('delivery_id', $lastDeliveryId)
                        ->where('product_id', $product_id)
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
            }
            $detailExport = DetailExport::where('id', $firstDetailExportId)->first();

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
        }
        // dd($data);
        for ($i = 0; $i < count($data['product_name']); $i++) {
            if (!isset($data['product_id'][$i], $data['warehouse_id'][$i], $data['product_qty'][$i])) {
                continue;
            }
            $productWh = ProductWarehouse::where('product_id', $data['product_id'][$i])->where('warehouse_id', $data['warehouse_id'][$i])->first();
            $product = Products::find($data['product_id'][$i]);
            if ($product) {
                if ($product->type != 2) {
                    $result = $productWh->qty - ($data['product_qty'][$i] + ($data['promotion_qty'][$i] == null ? 0 : $data['promotion_qty'][$i]));
                    $productWh->update([
                        'qty' => $result,
                    ]);
                }
                // Cập nhật delivered_id nếu có SN
                $deliveredList = Delivered::where('delivery_id', $deliveryId)->where('product_id', $product->id)
                    ->get();
                if ($deliveredList) {
                    foreach ($deliveredList as $item) {
                        History::whereIn('id', $id_history)->where('delivery_id', $item->delivery_id)->where('product_id', $item->product_id)->update([
                            'delivered_id' => $item->id
                        ]);
                    }
                }
            }
        }
        // dd(1);
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
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->groupBy(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'users.name',
                'guest.guest_name_display',
                'delivery.created_at',
                'delivery.status',
                'detailexport.guest_name'
            );
        if (isset($data['search'])) {
            $delivery = $delivery->where(function ($query) use ($data) {
                $query->orWhere('code_delivery', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailexport.guest_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['return_code'])) {
            $delivery = $delivery->where('delivery.code_delivery', 'like', '%' . $data['return_code'] . '%'); // Mã phiếu
        }

        if (isset($data['guests'])) {
            $delivery = $delivery->where('guest.guest_name_display', 'like', '%' . $data['guests'] . '%'); // Khách hàng
        }

        if (isset($data['status'])) {
            $delivery = $delivery->whereIn('delivery.status', $data['status']); // Trạng thái
        }

        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $delivery = $delivery->whereBetween('delivery.created_at', [$dateStart, $dateEnd]); // Ngày lập
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $delivery = $delivery->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $delivery = $delivery->get();
        // dd($delivery);
        return $delivery;
    }
    public function getSumDelivery($data = null)
    {
        $deliveries = Delivery::leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->leftJoin('groups', 'groups.id', 'guest.group_id')
            ->select(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery as maPhieu',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'delivery.id as maGiaoHang',
                'delivery.created_at as ngayTao',
                'delivery.updated_at as ngayGiao',
                'delivery.status as trangThai',
                'users.name',
                'guest.guest_name_display as nameGuest',
                'delivery.promotion',
                'delivery.totalVat as totalVat',
                'groups.name as nhomKH',
                DB::raw('(
                        SELECT 
                            CASE 
                                WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
                                    CASE 
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
                                            (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm số tiền trực tiếp và áp dụng thuế
                                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
                                            ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100)) -- Giảm phần trăm trên tổng giá trị sản phẩm và áp dụng thuế
                                        ELSE 
                                            COALESCE(SUM(product_total_vat), 0) -- Không có khuyến mãi
                                    END
                                ELSE
                                    COALESCE(SUM(product_total_vat), 0) -- Giá trị ban đầu nếu $.value = 0
                            END
                        FROM delivered 
                        LEFT JOIN products ON delivered.product_id = products.id
                        WHERE delivered.delivery_id = delivery.id
                    ) as totalProductVat')
            )
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace);
        $deliveries = filterByDate($data, $deliveries, 'delivery.created_at');
        $deliveries = $deliveries->groupBy(
            'delivery.id',
            'delivery.guest_id',
            'delivery.quotation_number',
            'delivery.code_delivery',
            'delivery.shipping_unit',
            'delivery.shipping_fee',
            'users.name',
            'delivery.created_at',
            'delivery.updated_at',
            'delivery.status',
            'guest.guest_name_display',
            'delivery.promotion',
            'delivery.totalVat',
            'groups.name',
        )
            ->orderBy('delivery.id', 'desc');
        $deliveries = $deliveries->get();
        // dd($deliveries);
        return $deliveries;
    }

    public function AjaxGetSumDelivery($data)
    {
        $deliveries = Delivery::leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->leftJoin('groups', 'groups.id', 'guest.group_id')
            ->select(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery as maPhieu',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'delivery.id as maGiaoHang',
                'delivery.created_at as ngayTao',
                'delivery.updated_at as ngayGiao',
                'delivery.status as trangThai',
                'users.name',
                'guest.guest_name_display as nameGuest',
                'delivery.promotion',
                'delivery.totalVat as totalVat',
                'groups.name as nhomKH',
            )
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->where('delivery.workspace_id', Auth::user()->current_workspace);
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $deliveries = $deliveries->whereBetween('delivery.created_at', [$dateStart, $dateEnd]);
        }
        $deliveries = $deliveries->groupBy(
            'delivery.id',
            'delivery.guest_id',
            'delivery.quotation_number',
            'delivery.code_delivery',
            'delivery.shipping_unit',
            'delivery.shipping_fee',
            'users.name',
            'delivery.created_at',
            'delivery.updated_at',
            'delivery.status',
            'guest.guest_name_display',
            'delivery.promotion',
            'delivery.totalVat',
            'groups.name',
        )
            ->orderBy('delivery.id', 'desc');
        $deliveries = $deliveries->get();
        return $deliveries;
    }
}
