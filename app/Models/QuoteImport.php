<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuoteImport extends Model
{
    use HasFactory;
    protected $table = 'quoteimport';
    protected $fillable = [
        'detailimport_id',
        'product_id',
    ];
    public function getAllQuote()
    {
        return DB::table($this->table)->get();
    }

    public function addQuoteImport($data, $id)
    {
        for ($i = 0; $i < count($data['product_code']); $i++) {
            $dataQuote = [
                'detailimport_id' => $id,
                'product_code' => $data['product_code'][$i],
                'product_name' => $data['product_name'][$i],
                'product_unit' => $data['product_unit'][$i],
                'product_qty' => $data['product_qty'][$i],
                'product_tax' => $data['product_tax'][$i],
                'product_total' => $data['total_price'][$i],
                'price_export' => 0,
                'product_ratio' => 0,
                'price_import' => $data['price_import'][$i],
                'product_note' => $data['product_note'][$i],
            ];
            DB::table($this->table)->insert($dataQuote);
        }
        // return $result;
    }
}
