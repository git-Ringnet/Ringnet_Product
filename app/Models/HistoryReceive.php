<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistoryReceive extends Model
{
    use HasFactory;
    protected $table = 'history_receive';
    protected $fillable = [
        'receive_id',
        'shipping_unit',
        'delivery_charges',
        'status'
    ];
    public function getQuotetion()
    {
        return $this->hasOne(Receive_bill::class, 'id', 'receive_id');
    }
    public function addHistoryReceive($data, $id)
    {
        $receive = Receive_bill::where('id', $id)->first();
        if ($receive) {
            $dataHistory = [
                'receive_id' => $receive->id,
                'shipping_unit' => $data['shipping_unit'],
                'delivery_charges' => $data['delivery_charges'] == null ? 0 : str_replace(',', '', $data['delivery_charges']),
                'status' => 1,
                'created_at' => Carbon::now(),
            ];
            $history_id = DB::table($this->table)->insertGetId($dataHistory);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                ProductImport::where('detailimport_id', $receive->id)->where('receive_id', 0)->update([
                    'receive_id' => $history_id,
                ]);
            }
        }
    }
    public function updateHistoryReceive($data, $id)
    {
        $result = true;
        $history = HistoryReceive::where('id', $id)->first();
        if ($history && $history->status == 1) {
            // Cập nhật trạng thái
            $dataUpdate = [
                'status' => 2,
            ];
            DB::table($this->table)->where('id', $history->id)->update($dataUpdate);

            // Cập nhập dư nợ
            $receive = Receive_bill::where('id', $history->receive_id)->first();
            if ($receive) {
                $detail = DetailImport::findOrFail($receive->detailimport_id);

                $product = ProductImport::where('receive_id', $history->id)->get();
                $total = 0;
                if ($product) {
                    foreach ($product as $item) {
                        $getProduct = QuoteImport::where('id', $item->quoteImport_id)->first();
                        $price_export = $getProduct->price_export;
                        $total += $price_export * $item->product_qty;
                    }

                    $getDebt = Provides::where('id', $detail->provide_id)->first();
                    $total += $getDebt->provide_debt;
                    DB::table('provides')->where('id', $detail->provide_id)->update([
                        'provide_debt' => $total
                    ]);
                } else {
                    return $result = false;
                }
            } else {
                return $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
        // dd($result);
    }
}
