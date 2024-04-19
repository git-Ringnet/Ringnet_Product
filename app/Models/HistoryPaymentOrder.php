<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryPaymentOrder extends Model
{
    use HasFactory;
    protected $table = 'history_payment_order';
    protected $fillable = [
        'payment_id',
        'total',
        'payment',
        'debt', 'workspace_id', 'provide_id', 'created_at',
    ];

    // public function getPaymentCode(){
    //     return $this->hasOne(PayOder::class, 'id','payment_id');
    // }

    public function addHistoryPayment($data, $id)
    {
        $status = false;
        $payment = PayOder::where('id', $id)->first();
        if ($payment) {
            $dataHistory = [
                'payment_id' => $payment->id,
                'total' => $payment->total,
                // 'payment' => $payment->payment,
                'payment' => isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0,
                'debt' => $payment->debt,
                'created_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace,
                'provide_id' => $payment->provide_id,
                'payment_type' => $data['payment_type'],
                'user_id' => Auth::user()->id
            ];
            $checkHistory = HistoryPaymentOrder::where('payment_id', $payment->id)
                ->where('total', $payment->total)
                ->where('payment', $payment->payment)
                ->where('debt', $payment->debt)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if (!$checkHistory) {
                DB::table($this->table)->insert($dataHistory);
            }
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
}
