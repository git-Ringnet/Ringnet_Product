<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class productPay extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pay_id',
        'product_id',
        'pay_qty',
        'workspace_id', 'created_at'
    ];
    protected $table = 'product_pay';

    public function addProductPay($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            if ($data['product_id'][$i] != null) {
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                    ->where('detailexport_id', $data['detailexport_id'])
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_payment += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }

            $dataPay = [
                'pay_id' => $id,
                'product_id' => $data['product_id'][$i],
                'pay_qty' => $data['product_qty'][$i],
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table($this->table)->insert($dataPay);
        }
    }
    public function addProductPayQuick($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                ->where('detailexport_id', $data['detailexport_id'])
                ->first();
            $result = $quoteExport->product_qty - $quoteExport->qty_payment;
            if ($data['product_id'][$i] != null) {
                $quoteExport->qty_payment += $result;
                $quoteExport->save();
            }
            if ($result > 0) {
                $dataPay = [
                    'pay_id' => $id,
                    'product_id' => $data['product_id'][$i],
                    'pay_qty' => $result,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                DB::table($this->table)->insert($dataPay);
            }
        }
    }
}
