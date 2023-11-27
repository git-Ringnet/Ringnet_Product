<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class productPay extends Model
{
    use HasFactory;
    protected $fillable = [
        'pay_id',
        'product_id',
        'pay_qty',
    ];
    protected $table = 'product_pay';

    public function addProductPay($data, $id)
    {
        for ($i = 0; $i < count($data['product_code']); $i++) {
            if ($data['product_id'][$i] != null) {
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])->first();
                if ($quoteExport) {
                    $quoteExport->qty_payment += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }

            $dataPay = [
                'pay_id' => $id,
                'product_id' => $data['product_id'][$i],
                'pay_qty' => $data['product_qty'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table($this->table)->insert($dataPay);
        }
    }
}
