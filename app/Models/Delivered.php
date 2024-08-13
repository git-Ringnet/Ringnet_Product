<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\SmartPunct\Quote;

class Delivered extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'delivery_id',
        'product_id',
        'deliver_qty',
        'price_export',
        'product_total_vat',
        'workspace_id',
        'created_at',
        'updated_at', 'promotion', 'promotion_qty',
    ];
    protected $table = 'delivered';

    public function addDelivered($data, $id)
    {
        $productID = null;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i] ?? 0);
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
                    'product_code' => $data['product_code'][$i] ?? null,
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
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                    ->where('detailexport_id', $data['detailexport_id'])
                    ->where('status', 1)
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_delivery += $data['product_qty'][$i];
                    $quoteExport->warehouse_id = isset($data['warehouse_id'][$i]) ? $data['warehouse_id'][$i] : 0;
                    $quoteExport->save();
                }
            }
            //thêm giá xuất và thành tiền có thuế của mỗi sản phẩm giao
            $product_tax = 0;
            if ($data['product_tax'][$i] ?? 0 == 99) {
                $product_tax = 0;
            } else {
                $product_tax = $data['product_tax'][$i] ?? 0;
            }

            $promotionValue = str_replace(',', '', $data['discount_input'][$i] ?? 0);
            $promotion = [
                'type' => $data['discount_option'][$i] ?? 0,
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
            $promotionTotal = [
                'type' => $data['promotion-option-total'],
                'value' => isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0,
            ];
            if ($promotionTotal['value'] != 0) {
                $tolTax = $totalPriceAfterDiscount;
            } else {
                $priceTax = ($totalPriceAfterDiscount * $product_tax) / 100;
                $tolTax = $totalPriceAfterDiscount + $priceTax;
            }

            $dataDelivered = [
                'delivery_id' => $id,
                'product_id' => $data['product_id'][$i] == null ? $productID : $data['product_id'][$i],
                'deliver_qty' => $data['product_qty'][$i],
                'price_export' => $priceExport,
                'product_total_vat' => $tolTax,
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => Auth::user()->id,
                'promotion' => json_encode($promotion),
                'promotion_qty' => $data['promotion_qty'][$i],
            ];
            // DB::table($this->table)->insert($dataDelivered);
            $delivered_id = DB::table($this->table)->insertGetId($dataDelivered);

            //thêm sản phẩm từ đơn giao hàng
            $checkProduct = Products::where('product_name', $data['product_name'][$i])->first();
            if (!$checkProduct) {
                $product = new Products($dataProduct);
                $product->save();
            }
            $delivery = Delivery::find($id);
            $checkQuote = QuoteExport::where('detailexport_id', $delivery->detailexport_id)
                ->where('product_id', $data['product_id'][$i])
                ->first();
            if ($delivery) {
                if (!$checkQuote) {
                    $dataQuote = [
                        'detailexport_id' => $delivery->detailexport_id,
                        'product_code' => $data['product_code'][$i] ?? null,
                        'product_id' => $checkProduct == null ? $product->id : $checkProduct->id,
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $data['product_qty'][$i],
                        'product_tax' => $data['product_tax'][$i] ?? 0,
                        'product_total' => 0,
                        'price_export' => 0,
                        'product_ratio' => 0,
                        'price_import' => 0,
                        'workspace_id' => Auth::user()->current_workspace,
                        'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'product_delivery' => $id,
                        'qty_delivery' => $data['product_qty'][$i],
                        'status' => '1',
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
                        'detailexport_id' => $data['detailexport_id'] ?? 0,
                        'status' => 3,
                        'delivery_id' => $id,
                    ]);
                }
            }
        }
    }
    public function addDeliveredQuick($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            if (!empty($data['price_import'][$i])) {
                $priceImport = str_replace(',', '', $data['price_import'][$i]);
            } else {
                $priceImport = null;
            }
            $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                ->where('detailexport_id', $data['detailexport_id'])
                ->first();
            $result = $quoteExport->product_qty - $quoteExport->qty_delivery;
            if ($data['product_id'][$i] == null) {
                $dataProduct = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_guarantee' => 1,
                    'product_price_export' => $price,
                    'product_price_import' => isset($priceImport) ? $priceImport : 0,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'user_id' => Auth::user()->id,
                ];
                $product = new Products($dataProduct);
                $product->save();
            } else {
                $quoteExport->qty_delivery += $result;
                $quoteExport->save();
            }

            if ($result > 0) {
                $dataDelivered = [
                    'delivery_id' => $id,
                    'product_id' => $data['product_id'][$i],
                    'deliver_qty' => $result,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'user_id' => Auth::user()->id,
                ];
                DB::table($this->table)->insert($dataDelivered);
            }
        }
    }
    public function sumDelivered()
    {
        $delivered = Delivered::leftJoin('products', 'products.id', 'delivered.product_id')
            ->select('products.*', 'delivered.*')
            ->get();
        return $delivered;
    }
    public function getAllHistory()
    {
        $history = History::where('history.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('delivered', 'history.delivered_id', 'delivered.id')
            ->leftJoin('products', 'products.id', 'delivered.product_id')
            ->leftJoin('quoteimport', 'quoteimport.id', 'history.history_import')
            ->leftJoin('delivery', 'delivery.id', 'delivered.delivery_id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            // ->where('products.group_id', 0)
            ->select(
                'products.product_code as product_code',
                'products.group_id as group_id',
                'guest.group_id as group_idGuest',
                'products.product_unit as product_unit',
                'delivery.code_delivery as code_delivery',
                'delivered.price_export as price_export',
                'delivered.product_total_vat as product_total_vat',
                DB::raw('delivered.price_export * delivered.deliver_qty as giaban'),
                'delivered.deliver_qty as slxuat',
                DB::raw('CASE 
                    WHEN history.tax_import = 99 THEN 0
                    ELSE (history.tax_import * delivered.price_export * delivered.deliver_qty) / 100 
                END as thueXuatCalculated'),
                DB::raw('delivered.price_export * delivered.deliver_qty + CASE 
                    WHEN history.tax_import = 99 THEN 0 
                    ELSE (history.tax_import * delivered.price_export * delivered.deliver_qty) / 100 
                END as thanhtienxuat'),
                DB::raw('quoteimport.product_qty * history.price_import as tienThue'),
                DB::raw('CASE 
                    WHEN history.tax_import = 99 THEN 0 
                    ELSE (history.tax_import * history.price_import * quoteimport.product_qty) / 100 
                END as thueNhapCalculated'),
                DB::raw('history.price_import * quoteimport.product_qty + CASE 
                    WHEN history.tax_import = 99 THEN 0 
                    ELSE (history.tax_import * history.price_import * quoteimport.product_qty) / 100 
                END as thanhtiennhap'),
                'history.*'
            );
        $history = $history->orderBy('id', 'desc')->get();
        return $history;
    }
}
