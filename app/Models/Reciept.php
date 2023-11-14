<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reciept extends Model
{
    use HasFactory;
    protected $table = 'reciept';
    protected $fillable = [
        'detailimport_id',
        'receive_id',
        'provide_id',
        'status',
        'price_total'
    ];
    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }
    public function getQuotation()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function addReciept($data, $id)
    {  
        dd($id);
        // $check_status = true;
        $total = 0;
        $product_id = 0;
        if ($id == "") {
            $receive_id = Receive_bill::findOrFail($data['detailimport_id']);
            $product_id = $receive_id->id;
        } else {
            $product_id = $id;
            $receive_id = Receive_bill::findOrFail($id);
        }
        if ($receive_id) {
            $detail = DetailImport::findOrFail($receive_id->detailimport_id);
            $receive_id->status = 2;
            $receive_id->save();
        }
        $product = QuoteImport::where('receive_id', $product_id)->get();
        foreach ($product as $item) {
            if ($item->product_ratio > 0 && $item->price_import > 0) {
                $total += (($item->product_ratio + 100) * $item->price_import / 100) * $item->product_qty;
            } else {
                $total += $item->product_qty * $item->price_export;
            }
        }
        $dataReciept = [
            'detailimport_id' => $detail->id,
            'receive_id' => $product_id,
            'provide_id' => $detail->provide_id,
            'status' => 1,
            'price_total' => $total,
            'created_at' => Carbon::now(),
        ];
        DB::table($this->table)->insert($dataReciept);

        $this->updateStatus($receive_id->detailimport_id, Receive_bill::class, 'status_reciept');
    }
    public function updateReciept($data, $id)
    {
        if ($id == "") {
            dd(1);
        } else {
            $reciept = Reciept::findOrFail($id);
            if ($reciept) {
                $detail = DetailImport::findOrFail($reciept->detailimport_id);
                $startDate = Carbon::parse(!isset($data['payment_date']) ? Carbon::now() : $data['payment_date']);
                $daysToAdd = intval($detail->price_effect);
                $endDate = $startDate->copy()->addDays($daysToAdd);
                $endDateFormatted = $endDate->format('Y-m-d');
                // $endDate = Carbon::parse($endDate);

                $dataPayment = [
                    'detailimport_id' => $reciept->detailimport_id,
                    'reciept_id' => $id,
                    'provide_id' => $reciept->provide_id,
                    'status' => 1,
                    'payment_date' => $endDateFormatted,
                    'total' => $reciept->price_total,
                    'payment' => 0,
                    'debt' => 0,
                ];
                DB::table('pay_order')->insert($dataPayment);
                DB::table('reciept')->where('id', $id)->update([
                    'status' => 2,
                ]);
            }
        }
        $this->updateStatus($id, Receive_bill::class, 'status_pay');
    }

    public function updateStatus($id, $nameDB, $dataupdate)
    {
        $check_status = true;
        $receive = $nameDB::findOrFail($id);
        $allBill = $nameDB::where('detailimport_id', $receive->detailimport_id)->get();
        $allProduct = QuoteImport::where('detailimport_id', $receive->detailimport_id)->get();
        foreach ($allProduct as $item) {
            if ($item->receive_id == 0) {
                $check_status = false;
            }
        }
        foreach ($allBill as $value) {
            if ($value->status == 1) {
                $check_status = false;
            }
        }
        if ($check_status) {
            DB::table('detailimport')->where('id', $receive->detailimport_id)->update([
                $dataupdate => 2
            ]);
        } else {
            DB::table('detailimport')->where('id', $receive->detailimport_id)->update([
                $dataupdate => 1
            ]);
        }
    }
    
}
