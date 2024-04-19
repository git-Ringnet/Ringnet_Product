<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class productBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'billSale_id',
        'product_id',
        'user_id',
        'billSale_qty',
        'workspace_id',
        'created_at',
    ];
    protected $table = 'product_bill';

    public function addProductBill($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            if ($data['product_id'][$i] != null) {
                $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                    ->where('detailexport_id', $data['detailexport_id'])
                    ->first();
                if ($quoteExport) {
                    $quoteExport->qty_bill_sale += $data['product_qty'][$i];
                    $quoteExport->save();
                }
            }

            $dataBill = [
                'billSale_id' => $id,
                'user_id' => Auth::user()->id,
                'product_id' => $data['product_id'][$i],
                'billSale_qty' => $data['product_qty'][$i],
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table($this->table)->insert($dataBill);
        }
    }
    public function addProductBillQuick($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $quoteExport = QuoteExport::where('product_id', $data['product_id'][$i])
                ->where('detailexport_id', $data['detailexport_id'])
                ->first();
            $result = $quoteExport->product_qty - $quoteExport->qty_bill_sale;
            if ($data['product_id'][$i] != null) {
                $quoteExport->qty_bill_sale += $result;
                $quoteExport->save();
            }

            if ($result > 0) {
                $dataBill = [
                    'billSale_id' => $id,
                    'product_id' => $data['product_id'][$i],
                    'billSale_qty' => $result,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'user_id' => Auth::user()->id,
                ];
                DB::table($this->table)->insert($dataBill);
            }
        }
    }
}
