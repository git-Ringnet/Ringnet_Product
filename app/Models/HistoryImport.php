<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryImport extends Model
{
    use HasFactory;
    protected $table = 'history_import';
    protected $fillable = [
        'id',
        'detailImport_id',
        'quoteImport_id',
        'product_code',
        'product_name',
        'product_unit',
        'product_qty',
        'product_tax',
        'product_total',
        'price_export',
        'product_id',
        'provide_id',
        'product_ratio',
        'price_import',
        'product_note',
        'version',
        'workspace_id'
    ];

    public function addHistoryImport($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $quote = QuoteImport::where('detailimport_id', $id)
                ->where('product_name', $data['product_name'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $price_export = str_replace(',', '', $data['price_export'][$i]);
            $total_price = str_replace(',', '', $data['product_qty'][$i]) * $price_export;
            $checkData = HistoryImport::where('product_code', $data['product_code'][$i])
                ->where('product_name', $data['product_name'][$i])
                ->where('product_unit', $data['product_unit'][$i])
                ->where('product_qty', $data['product_qty'][$i])
                ->where('product_tax', $data['product_tax'][$i])
                // ->where('product_total', $total_price)
                // ->where('price_export', $price_export)
                ->where('product_note', $data['product_note'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->where('version', $quote->version)
                ->first();

            // if (isset($quote)) {
            //     $checkData->where('version', $quote->version)->first();
            // } else {
            //     $checkData->first();
            // }
            if ($checkData) {
                continue;
            } else {
                $getProvide = DetailImport::where('id', $id)->first();
                if ($quote && $getProvide) {
                    $dataHistory = [
                        'detailImport_id' => $id,
                        'quoteImport_id' => $quote->id,
                        'product_code' => $data['product_code'][$i],
                        'product_name' => $data['product_name'][$i],
                        'product_unit' => $data['product_unit'][$i],
                        'product_qty' => $data['product_qty'][$i],
                        'product_tax' => $data['product_tax'][$i],
                        'product_total' => $total_price,
                        'price_export' => $price_export,
                        'product_note' => $data['product_note'][$i],
                        'version' => $quote->version,
                        'created_at' => Carbon::now(),
                        'workspace_id' => Auth::user()->current_workspace,
                        'provide_id' => $getProvide->provide_id
                    ];
                    DB::table($this->table)->insert($dataHistory);
                }
            }
        }
    }
}
