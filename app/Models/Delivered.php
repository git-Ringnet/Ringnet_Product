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
        'updated_at'
    ];
    protected $table = 'delivered';

    public function addDelivered($data, $id)
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
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                    ->where('detailexport_id', $data['detailexport_id'])
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_delivery += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }
            //thêm giá xuất và thành tiền có thuế của mỗi sản phẩm giao
            $product_tax = 0;
            if ($data['product_tax'][$i] == 99) {
                $product_tax = 0;
            } else {
                $product_tax = $data['product_tax'][$i];
            }
            $priceTax = ($data['product_qty'][$i] * $priceExport *  $product_tax) / 100;
            $tolTax = ($data['product_qty'][$i] * $priceExport) + $priceTax;
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
                        'product_code' => $data['product_code'][$i],
                        'product_id' => $checkProduct == null ? $product->id : $checkProduct->id,
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $data['product_qty'][$i],
                        'product_tax' => $data['product_tax'][$i],
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
                        'detailexport_id' => $data['detailexport_id'],
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
}
