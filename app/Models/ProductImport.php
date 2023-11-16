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


    public function addProductImport($data, $id, $colum, $columQuote)
    {
        $status = false;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $qty = 0;
            $product = QuoteImport::where('product_name', $data['product_name'][$i])->first();
            if ($product) {
                if (str_replace(',', '', $data['product_qty'][$i]) > ($product->product_qty - $product->$columQuote)) {
                    $qty = $product->product_qty - $product->$columQuote;
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
                    if ($columQuote == "receive_qty") {
                        $receive_qty = $product->receive_qty;
                    } else if ($colum == "reciept_qty") {
                        $receive_qty = $product->reciept_qty;
                    } else {
                        $receive_qty = $product->payment_qty;
                    }


                    $dataQuote = [
                        // $columQuote => $receive_qty + $qty
                        $columQuote => $receive_qty + $qty
                    ];
                    QuoteImport::where('id', $product->id)->update($dataQuote);
                    $status = true;
                }
            }
        }
        return $status;
    }
}
