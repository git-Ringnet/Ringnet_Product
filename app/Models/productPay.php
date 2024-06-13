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
        'user_id',
        'pay_id',
        'product_id',
        'pay_qty',
        'workspace_id', 'created_at'
    ];
    protected $table = 'product_pay';

    public function addProductPay($data, $id, $export_id, $products_id)
    {
        for ($i = 0; $i < count($products_id); $i++) {
            // Use product ID from $products_id
            $product_id = $products_id[$i];

            if ($product_id != null) {
                $quoteExport = QuoteExport::where('product_id', $product_id)
                    ->where('detailexport_id', $export_id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->where('status', 1)
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_payment += $quoteExport->product_qty;
                    $quoteExport->save();
                }
            }

            $dataPay = [
                'pay_id' => $id,
                'user_id' => Auth::user()->id,
                'product_id' => $product_id,
                'pay_qty' => $quoteExport->product_qty,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace,
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
                    'user_id' => Auth::user()->id,
                    'workspace_id' => Auth::user()->current_workspace,
                ];
                DB::table($this->table)->insert($dataPay);
            }
        }
    }
}
