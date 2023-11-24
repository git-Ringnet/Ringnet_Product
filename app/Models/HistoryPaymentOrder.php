<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistoryPaymentOrder extends Model
{
    use HasFactory;
    protected $table = 'history_payment_order';
    protected $fillable = [
        'payment_id',
        'total',
        'payment',
        'debt'
    ];
    public function addHistoryPayment($data, $id)
    {
        $status = false;
        $payment = PayOder::where('id', $id)->first();
        if ($payment) {
            $dataHistory = [
                'payment_id' => $payment->id,
                'total' => $payment->total,
                'payment' => $payment->payment,
                'debt' => $payment->debt,
                'created_at' => Carbon::now(),
            ];
            DB::table($this->table)->insert($dataHistory);
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
}
