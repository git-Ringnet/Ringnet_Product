<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delivered extends Model
{
    use HasFactory;
    protected $fillable = [
        'delivery_id',
        'product_id',
        'deliver_qty',
    ];
    protected $table = 'delivered';

    public function addDelivered($data, $id)
    {
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
                    'product_price_import' => isset($priceImport) ? $priceImport : 0,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                ];
                $product = new Products($dataProduct);
                $product->save();
            } else {
                $product = Products::where('id', $data['product_id'][$i])->first();
                if ($product) {
                    $product->check_seri = isset($data['cbSeri'][$i]) ? $data['cbSeri'][$i] : null;
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

            $dataDelivered = [
                'delivery_id' => $id,
                'product_id' => $data['product_id'][$i],
                'deliver_qty' => $data['product_qty'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table($this->table)->insert($dataDelivered);
        }
        if (isset($data['selected_serial_numbers'])) {
            $selectedSerialNumbers = $data['selected_serial_numbers'];

            foreach ($selectedSerialNumbers as $serialNumberId) {
                $serialNumber = Serialnumber::find($serialNumberId);
                if ($serialNumber) {
                    $serialNumber->update([
                        'detailexport_id' => $id,
                        'status' => 3,
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
                ];
                DB::table($this->table)->insert($dataDelivered);
            }
        }
    }
}
