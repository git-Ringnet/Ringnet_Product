<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReturnExport extends Model
{
    use HasFactory;
    protected $table = "return_export";
    protected $fillable = [
        'id',
        'delivery_id',
        'description',
        'created_at',
        'updated_at',
        'workspace_id',
        'user_id',
        'status', 'total_return', 'guest_id', 'payment'
    ];
    public function getDelivery()
    {
        return $this->hasOne(Delivery::class, 'id', 'delivery_id');
    }
    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function getGuest()
    {
        return $this->hasOne(Guest::class, 'id', 'guest_id');
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'soGiaoHang')->where('table_name', $name)->get();
    }
    public function addReturnExport($data)
    {
        // dd($data);
        if (isset($data['date_deliver'])) {
            $date_deliver = $data['date_deliver'];
        } else {
            $date_deliver = Carbon::now();
        }
        // $promotion = [
        //     'type' => $data['promotion-option-total'],
        //     'value' => str_replace(',', '', $data['promotion-total']),
        // ];
        $dataReturnExport = [
            'guest_id' => $data['guest_id'],
            'delivery_id' => $data['detailexport_id'] ?? 0,
            'total_return' => $data['totalValue'] ?? 0,
            'payment' => $data['payment'] ?? 0,
            'description' => $data['description'] ?? '',
            'status' => 1,
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => $date_deliver == null ? now() : $date_deliver,
            'user_id' => Auth::user()->id,
            // 'promotion' => json_encode($promotion),
        ];
        $returnExport = new ReturnExport($dataReturnExport);
        $returnExport->save();

        if (isset($data['selected_serial_numbers'])) {
            $selectedSerialNumbers = $data['selected_serial_numbers'];
            foreach ($selectedSerialNumbers as $serialNumberId) {
                if ($serialNumberId) {
                    SeriReturn::create([
                        'seri_id' => $serialNumberId,
                        'return_id' => $returnExport->id,
                        'workspace_id' => Auth::user()->current_workspace,
                    ]);
                }
            }
        }

        return $returnExport->id;
    }
    public function addProductReturn($data, $id)
    {
        $productID = null;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            if (!empty($data['price_import'][$i])) {
                $priceImport = str_replace(',', '', $data['price_import'][$i]);
            } else {
                $priceImport = null;
            }
            if (!empty($data['product_price'][$i])) {
                $priceExport = str_replace(',', '', $data['product_price'][$i]);
            } else {
                $priceExport = 0;
            }
            if ($data['product_id'][$i] == null) {
                $dataProduct = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_guarantee' => 1,
                    'workspace_id' => Auth::user()->current_workspace,
                    'product_price_export' => $price,
                    'product_price_import' => isset($priceImport) ? $priceImport : 0,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'user_id' => Auth::user()->id,
                ];
                $product = new Products($dataProduct);
                $product->save();
                $productID = $product->id;
            } else {
                $product = Products::where('id', $data['product_id'][$i])->first();
                if ($product) {
                    $product->save();
                }
                $delivered = Delivered::where('product_id', $data['product_id'][$i])
                    ->where('delivery_id', $data['detailexport_id'])
                    // ->where('status', 1)
                    ->first();
                if ($delivered) {
                    $delivered->return_qty += $data['product_qty'][$i];
                    $delivered->save();
                }
            }
            //thêm giá xuất và thành tiền có thuế của mỗi sản phẩm giao
            $product_tax = 0;
            if ($data['product_tax'][$i] == 99) {
                $product_tax = 0;
            } else {
                $product_tax = $data['product_tax'][$i];
            }

            $promotionValue = str_replace(',', '', $data['discount_input'][$i]);
            $promotion = [
                'type' => $data['discount_option'][$i],
                'value' => $promotionValue,
            ];

            // Tính giảm giá
            if ($promotion['type'] == 1) { // Giảm số tiền trực tiếp
                $discountAmount = (float)$promotion['value'];
            } elseif ($promotion['type'] == 2) { // Giảm phần trăm trên giá trị sản phẩm
                $discountAmount = ($data['product_qty'][$i] * $priceExport * (float)$promotion['value']) / 100;
            } else {
                $discountAmount = 0; // Không có giảm giá
            }

            // Tính tổng tiền hàng sau giảm giá
            $totalPrice = $data['product_qty'][$i] * $priceExport;
            $totalPriceAfterDiscount = $totalPrice - $discountAmount;

            // Tính thuế
            $priceTax = ($totalPriceAfterDiscount * $product_tax) / 100;
            $tolTax = $totalPriceAfterDiscount + $priceTax;

            $dataProductReturn = [
                'return_export_id' => $id,
                'product_id' => $data['product_id'][$i] == null ? $productID : $data['product_id'][$i],
                'return_qty' => $data['product_qty'][$i],
                'price_export' => $priceExport,
                'product_total_vat' => $tolTax,
                'description' => $data['description'] ?? '',
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => Auth::user()->id,
                'promotion' => json_encode($promotion),
            ];
            // DB::table($this->table)->insert($dataProductReturn);
            $product_return_id = DB::table('product_return_export')->insertGetId($dataProductReturn);

            //thêm sản phẩm từ đơn giao hàng
            $checkProduct = Products::where('product_name', $data['product_name'][$i])->first();
            if (!$checkProduct) {
                $product = new Products($dataProduct);
                $product->save();
            }
            $returnExport = ReturnExport::find($id);
            $checkDelivered = Delivered::where('delivered.delivery_id', $returnExport->delivery_id)
                ->where('product_id', $data['product_id'][$i])
                ->first();
            if ($returnExport) {
                if (!$checkDelivered) {
                    $dataDelivered = [
                        'delivery_id' => $returnExport->delivery_id,
                        'product_id' => $checkProduct == null ? $product->id : $checkProduct->id,
                        'workspace_id' => Auth::user()->current_workspace,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'return_qty' => $data['product_qty'][$i],
                        'user_id' => Auth::user()->id,
                    ];
                    DB::table('delivered')->insert($dataDelivered);
                }
                if ($returnExport->status == 2) {
                    $product = Products::find($data['product_id'][$i]);
                    if ($product) {
                        if ($product->type != 2) {
                            $product->product_inventory += $data['product_qty'][$i];
                            $product->save();
                        }
                    }
                }
            }
        }
    }
    public function getReturnExportToId($id)
    {
        $returnExport = ReturnExport::where('return_export.id', $id)
            ->where('return_export.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'return_export.guest_id', 'guest.id')
            ->leftJoin('delivery', 'delivery.id', 'return_export.delivery_id')
            ->leftJoin('represent_guest', 'guest.id', 'represent_guest.guest_id')
            ->select(
                '*',
                'return_export.id as soGiaoHang',
                'return_export.status as tinhTrang',
                'return_export.created_at as ngayGiao',
                'return_export.promotion as promotion_return_export',
                'guest.id as guest_id',
                'represent_guest.id as represent_guest_id',
                'return_export.status as status'
            )
            ->first();
        return $returnExport;
    }
    public function getProductToId($id)
    {
        $product = ReturnExport::join('delivery', 'delivery.id', '=', 'return_export.delivery_id')
            ->leftJoin('product_return_export', 'product_return_export.return_export_id', 'return_export.id')
            ->leftJoin('products', 'products.id', 'product_return_export.product_id')
            ->where('product_return_export.return_export_id', $id)
            ->select(
                'products.id as id',
                'product_return_export.product_id',
                'products.product_code',
                'products.product_name',
                'products.product_unit',
                'products.product_ratio',
                'products.product_inventory',
                'products.product_tax',
                'product_return_export.price_export',
                'product_return_export.return_qty',
                'product_return_export.promotion',
                'delivery.created_at as ngayGiao',
                'products.type',
                'products.check_seri',
                DB::raw('
            CASE
                WHEN JSON_EXTRACT(product_return_export.promotion, "$.type") = "1" THEN 
                    (product_return_export.return_qty * product_return_export.price_export) - CAST(JSON_EXTRACT(product_return_export.promotion, "$.value") AS UNSIGNED)
                WHEN JSON_EXTRACT(product_return_export.promotion, "$.type") = "2" THEN 
                    (product_return_export.return_qty * product_return_export.price_export) * (1 - CAST(JSON_EXTRACT(product_return_export.promotion, "$.value") AS DECIMAL) / 100)
                ELSE 
                    product_return_export.return_qty * product_return_export.price_export
            END as product_total
        ')
            )
            ->get();
        return $product;
    }
    public function acceptReturnExport($data)
    {
        if (isset($data['date_deliver'])) {
            $date_deliver = $data['date_deliver'];
        } else {
            $date_deliver = Carbon::now();
        }
        $dataReturnExport = [
            'guest_id' => $data['guest_id'],
            'delivery_id' => $data['delivery_id'] ?? 0,
            'total_return' => $data['totalValue'] ?? 0,
            'payment' => $data['payment'] ?? 0,
            'description' => $data['description'] ?? '',
            'status' => 2,
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => $date_deliver == null ? now() : $date_deliver,
            'user_id' => Auth::user()->id,
        ];
        if (isset($data['return_id'])) {
            // Tìm kiếm bản ghi theo data['return_id'] và cập nhật
            $returnExport = ReturnExport::find($data['return_id']);
            if ($returnExport) {
                $returnExport->update($dataReturnExport);
                for ($i = 0; $i < count($data['product_id']); $i++) {
                    $productReturn = ProductReturnExport::where('product_id', $data['product_id'][$i])
                        ->where('return_export_id', $data['return_id'])->first();
                    if ($productReturn) {
                        $productReturn->return_qty = $data['product_qty'][$i];
                        $productReturn->save();
                    }
                    $product = Products::find($data['product_id'][$i]);
                    if ($product) {
                        if ($product->type != 2) {
                            $product->product_inventory += $data['product_qty'][$i];
                            $product->save();
                        }
                    }
                }
            } else {
                abort('404');
            }
        } else {
            // Tạo mới bản ghi
            $returnExport = new ReturnExport($dataReturnExport);
            $returnExport->save();
            if (isset($data['selected_serial_numbers'])) {
                $selectedSerialNumbers = $data['selected_serial_numbers'];
                foreach ($selectedSerialNumbers as $serialNumberId) {
                    if ($serialNumberId) {
                        SeriReturn::create([
                            'seri_id' => $serialNumberId,
                            'return_id' => $returnExport->id,
                            'workspace_id' => Auth::user()->current_workspace,
                        ]);
                    }
                }
            }
        }
        if (isset($data['selected_serial_numbers'])) {
            $selectedSerialNumbers = $data['selected_serial_numbers'];
            foreach ($selectedSerialNumbers as $serialNumberId) {
                $serialNumber = Serialnumber::find($serialNumberId);
                if ($serialNumber) {
                    $serialNumber->update([
                        'status' => 1,
                        'detailexport_id' => 0,
                    ]);
                }
            }
        }
        return $returnExport->id;
    }
    public function deleteReturnExportItem($id)
    {
        $returnExport = ReturnExport::where('id', $id)->first();
        if ($returnExport) {
            // Xoá seri
            $seriReturns = SeriReturn::where('return_id', $id)->get();
            foreach ($seriReturns as $seriReturn) {
                // Cập nhật trạng thái của serialnumber
                Serialnumber::where('id', $seriReturn->seri_id)->update(['status' => 2]);
                try {
                    if ($seriReturn->delete()) {
                        Log::info("Deleted seriReturn with id: " . $seriReturn->id);
                    } else {
                        Log::warning("Failed to delete seriReturn with id: " . $seriReturn->id);
                    }
                } catch (\Exception $e) {
                    Log::error("Error deleting seriReturn with id: " . $seriReturn->id . " - " . $e->getMessage());
                }
            }
            // Xoá sản phẩm trong bảng
            $returnProduct = ProductReturnExport::where('return_export_id', $returnExport->id)->get();
            if ($returnProduct) {
                foreach ($returnProduct as $item) {
                    if ($returnExport->status == 2) {
                        $product = Products::where('id', $item->product_id)->first();
                        $qty = $product->product_inventory - $item->return_qty;
                        $product->product_inventory = $qty;
                        $product->save();
                    }
                    $delivered_item = Delivered::where('delivery_id', $returnExport->delivery_id)->where('product_id', $item->product_id)->first();
                    $delivered_item->return_qty = $delivered_item->return_qty - $item->return_qty;
                    $delivered_item->save();

                    ProductReturnExport::where('id', $item->id)->delete();
                }
            }
            // Xóa đơn trả hàng
            ReturnExport::where('id', $returnExport->id)->delete();
            return true;
        } else {
            return false;
        }
    }
}
