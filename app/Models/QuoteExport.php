<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuoteExport extends Model
{
    use HasFactory;
    protected $table = 'quoteexport';
    protected $fillable = [
        'detailexport_id',
        'product_id',
    ];
    public function getAllQuoteExport()
    {
        $quoteExport = QuoteExport::all();
        return $quoteExport;
    }
    public function getAllGuest()
    {
        $guest = Guest::all();
        return $guest;
    }
    public function addQuoteExport($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            if (!empty($data['price_import'][$i])) {
                $priceImport = str_replace(',', '', $data['price_import'][$i]);
            } else {
                $priceImport = null;
            }
            $subtotal = $data['product_qty'][$i] * (float) $price;
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
                    'check_seri' => 1,
                ];
                $checkProduct = Products::where('product_name', $data['product_name'][$i])->first();
                if (!$checkProduct) {
                    $product = new Products($dataProduct);
                    $product->save();
                }
                $dataQuote = [
                    'detailexport_id' => $id,
                    'product_code' => $data['product_code'][$i],
                    'product_id' => $checkProduct == null ? $product->id : $checkProduct->id,
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => $data['product_qty'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                DB::table($this->table)->insert($dataQuote);
            } else {
                $dataQuote = [
                    'detailexport_id' => $id,
                    'product_code' => $data['product_code'][$i],
                    'product_id' => $data['product_id'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_qty' => $data['product_qty'][$i],
                    'product_tax' => $data['product_tax'][$i],
                    'product_total' => $subtotal,
                    'price_export' => $price,
                    'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                    'price_import' => $priceImport,
                    'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                DB::table($this->table)->insert($dataQuote);
            }
        }
    }
    public function updateQuoteExport($data, $id)
    {
        $quoteExports = QuoteExport::where('detailexport_id', $id)->get();
        if (!$quoteExports->isEmpty()) {
            $quoteExports->each(function ($quoteExport) {
                $quoteExport->delete();
            });
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $price = str_replace(',', '', $data['product_price'][$i]);
                if (!empty($data['price_import'][$i])) {
                    $priceImport = str_replace(',', '', $data['price_import'][$i]);
                } else {
                    $priceImport = null;
                }
                $subtotal = $data['product_qty'][$i] * (float) $price;
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
                    $dataQuote = [
                        'detailexport_id' => $id,
                        'product_code' => $data['product_code'][$i],
                        'product_id' => $product->id,
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $data['product_qty'][$i],
                        'product_tax' => $data['product_tax'][$i],
                        'product_total' => $subtotal,
                        'price_export' => $price,
                        'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                        'price_import' => $priceImport,
                        'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                    DB::table($this->table)->insert($dataQuote);
                } else {
                    $dataQuote = [
                        'detailexport_id' => $id,
                        'product_code' => $data['product_code'][$i],
                        'product_id' => $data['product_id'][$i],
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $data['product_qty'][$i],
                        'product_tax' => $data['product_tax'][$i],
                        'product_total' => $subtotal,
                        'price_export' => $price,
                        'product_ratio' => isset($data['product_ratio'][$i]) ? $data['product_ratio'][$i] : 0,
                        'price_import' => $priceImport,
                        'product_note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                    DB::table($this->table)->insert($dataQuote);
                }
            }
        }
    }
    public function getProductsbyId($id)
    {
        $products = DB::table('quoteexport')
            ->whereIn('product_id', $id)
            ->join('products', 'quoteexport.product_id', '=', 'products.id')
            ->select('products.*', 'quoteexport.*', 'quoteexport.product_qty')
            ->get();
        return $products;
    }
}
