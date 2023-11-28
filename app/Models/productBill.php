<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class productBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'billSale_id',
        'product_id',
        'billSale_qty',
    ];
    protected $table = 'product_bill';

    public function addProductBill($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            if ($data['product_id'][$i] != null) {
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])->first();
                if ($quoteExport) {
                    $quoteExport->qty_bill_sale += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }

            $dataBill = [
                'billSale_id' => $id,
                'product_id' => $data['product_id'][$i],
                'billSale_qty' => $data['product_qty'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table($this->table)->insert($dataBill);
        }
    }
}
