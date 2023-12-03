<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayExport extends Model
{
    use HasFactory;
    protected $fillable = [
        'detailexport_id',
        'guest_id',
        'payment_date',
        'total',
        'payment',
        'debt',
        'status',
    ];
    protected $table = 'pay_export';


    public function checkSL($data)
    {
        $payExport = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->select('*', 'detailexport.id as maXuat')
            ->selectRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_payment, 0) as soLuong')
            ->where('detailexport.id', $data['detailexport_id'])
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_payment, 0) > 0')
            ->get();
        $check = !$payExport->isEmpty();
        return $check;
    }

    public function addPayExport($data)
    {
        if (isset($data['total'])) {
            $total = $data['total'];
            if ($total !== null) {
                $total = str_replace(',', '', $total);
            }
        } else {
            $detailExport = DetailExport::find($data['detailexport_id']);
            $total = $detailExport->amount_owed;
        }
        if (isset($data['payment'])) {
            $payment = str_replace(',', '', $data['payment']);
        } else {
            $payment = 0;
        }
        if (isset($data['date_pay'])) {
            $date_pay = $data['date_pay'];
        } else {
            $date_pay = Carbon::now();
        }
        $result = $total - $payment;
        $dataPay = [
            'detailexport_id' => $data['detailexport_id'],
            'guest_id' => $data['guest_id'],
            'payment_date' =>  $date_pay,
            'total' => $total,
            'payment' => $payment,
            'debt' => $result,
            'status' => 1,
            'created_at' => Carbon::now(),
        ];
        $payExport = new PayExport($dataPay);
        $payExport->save();
        if ($result == 0) {
            $payExport->update([
                'status' => 2,
            ]);
        }
        if (isset($data['payment'])) {
            $history = new history_Pay_Export;
            $history->pay_id = $payExport->id;
            $history->total = $total;
            $history->payment = $payment;
            $history->debt = $result;
            $history->save();
            $payExport->update([
                'payment' => $payment,
            ]);
        }
        return $payExport->id;
    }

    public function updateDetailExport($data, $detailexport_id)
    {
        $total = str_replace(',', '', $data['total']);
        if (isset($data['payment'])) {
            $payment = str_replace(',', '', $data['payment']);
        } else {
            $payment = 0;
        }
        if (isset($data['daThanhToan'])) {
            $daThanhToan = str_replace(',', '', $data['daThanhToan']);
        } else {
            $daThanhToan = 0;
        }
        $result = $total - $daThanhToan - $payment;
        $payExport = PayExport::where('detailexport_id', $detailexport_id)
            ->first();
        $detailExport = DetailExport::where('id', $detailexport_id)->first();
        if ($detailExport) {
            $detailExport->update([
                'amount_owed' => $result,
                'status' => 2,
            ]);
            if ($detailExport->amount_owed <= 0) {
                $detailExport->update([
                    'status_pay' => 2,
                ]);
                $payExport->update([
                    'status' => 2,
                ]);
                if ($detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
                    $detailExport->update([
                        'status' => 3,
                    ]);
                }
            } else {
                $detailExport->update([
                    'status_pay' => 3,
                ]);
            }
        }
        $history = new history_Pay_Export;
        $history->pay_id = $payExport->id;
        $history->total = $total;
        $history->payment = $payment;
        $history->debt = $detailExport->amount_owed;
        $history->save();
        $payExport->update([
            'payment' => $payment,
            'debt' =>  $detailExport->amount_owed,
        ]);
        return $detailExport;
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }
}
