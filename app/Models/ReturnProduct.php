<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReturnProduct extends Model
{
    use HasFactory;
    protected $table = "returnproduct";

    protected $fillable = [
        'id',
        'quoteimport_id',
        'qty',
        'created_at',
        'updated_at',
        'sn',
        'returnImport_id',
    ];

    public function getQuoteImport()
    {
        return $this->hasOne(QuoteImport::class, 'id', 'quoteimport_id');
    }


    public function addReturnProduct($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $SN = [];
            if (isset($data['seri' . $i])) {
                $productSN = $data['seri' . $i];
                for ($j = 0; $j < count($productSN); $j++) {
                    if (!empty($productSN[$j])) {
                        array_push($SN, $productSN[$j]);
                    }
                }
            }
            $getQuoteImport = QuoteImport::where('product_name', $data['product_name'][$i])->where('receive_id', $data['detailimport_id'])->first();
            if ($getQuoteImport) {
                $dataReturnProduct = [
                    'quoteimport_id' => $getQuoteImport->id,
                    'qty' => $data['product_qty'][$i],
                    'created_at' => Carbon::now(),
                    'sn' => json_encode($SN),
                    'returnImport_id' => $id,
                ];
                DB::table($this->table)->insert($dataReturnProduct);
            }
        }
    }
}
