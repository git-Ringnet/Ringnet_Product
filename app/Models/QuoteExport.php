<?php

namespace App\Models;

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
        for ($i = 0; $i < count($data['product_code']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            $subtotal = $data['product_qty'][$i] * (float) $price;
            $checkCode = ProductCode::where('product_code', $data['product_code'][$i])->first();
            if ($checkCode) {
                $idProductCode = $checkCode->id;
            } else {
                $newProductCode = ProductCode::create([
                    'product_code' => $data['product_code'][$i]
                ]);
                $idProductCode = $newProductCode->id;
            }
            $dataQuote = [
                'detailexport_id' => $id,
                'product_code' => $idProductCode,
                'product_name' => $data['product_name'][$i],
                'product_unit' => $data['product_unit'][$i],
                'product_qty' => $data['product_qty'][$i],
                'product_tax' => $data['product_tax'][$i],
                'product_total' => $subtotal,
                'price_export' => $price,
                'product_ratio' => 0,
                'price_import' => isset($data['price_import'][$i]) ? $data['price_import'][$i] : 0,
                'product_note' => isset($data['product_note'][$i]) ? $data['price_import'][$i] : null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table($this->table)->insert($dataQuote);
        }
        // return $result;
    }
}
