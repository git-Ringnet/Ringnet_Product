<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductImport extends Model
{
    use HasFactory;
    protected $table = 'products_import';
    protected $fillable = [
        'detailimport_id',
        'quoteImport_id',
        'product_code',
        'product_name',
        'product_unit',
        'product_qty',
        'product_tax',
        'product_total',
        'price_export',
        'product_ratio',
        'price_import',
        'product_note',
        'receive_id',
        'reciept_id',
        'payOrder_id'
    ];

    public function getSerialNumber()
    {
        return $this->hasMany(Serialnumber::class, 'product_id', 'product_id');
    }


    public function addProductImport($data, $id, $colum)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product_ratio = 0;
            $price_import = 0;
            $qty = 0;
            isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
            isset($data['price_import']) ? $price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
            $product = QuoteImport::where('product_name', $data['product_name'][$i])->first();
            if ($product) {
                if (str_replace(',', '', $data['product_qty'][$i]) > ($product->product_qty - $product->receive_qty)) {
                    $qty = $product->product_qty - $product->receive_qty;
                } else {
                    $qty = str_replace(',', '', $data['product_qty'][$i]);
                }
                if ($qty == 0) {
                    continue;
                } else {
                    // if ($product_ratio > 0 && $price_import > 0) {
                    //     $price_export = (($product_ratio + 100) * $price_import) / 100;
                    //     $total_price = $price_export * $qty;
                    // } else {
                    //     $price_export = str_replace(',', '', $data['price_export'][$i]);
                    //     $total_price = $qty * $price_export;
                    // }
                    $dataProductImport = [
                        'detailimport_id' => $id,
                        'quoteImport_id' => $product->id,
                        // 'product_code' => $data['product_code'][$i],
                        // 'product_name' => $data['product_name'][$i],
                        // 'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $qty,
                        // 'product_tax' => $data['product_tax'][$i],
                        // 'price_export' => $price_export,
                        // 'product_total' => $total_price,
                        // 'product_ratio' => $product_ratio,
                        // 'price_import' => $price_import,
                        // 'product_note' => $data['product_note'][$i],
                        $colum => 0
                    ];
                    DB::table($this->table)->insert($dataProductImport);

                    // Thêm số lượng sản phẩm đã nhập
                    $receive_qty = $product->receive_qty;
                    $dataQuote = [
                        'receive_qty' => $receive_qty + $qty
                    ];
                    QuoteImport::where('id', $product->id)->update($dataQuote);
                }
            }
        }
    }
}
