<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayExport extends Model
{
    use HasFactory;
    protected $fillable = [
        'detailexport_id',
        'billSale_id',
        'guest_id',
        'payment_date',
        'total',
        'payment',
        'debt',
        'status',
    ];
    protected $table = 'pay_export';

    public function addPayExport($data)
    {
        $total = str_replace(',', '', $data['total']);
        $payment = str_replace(',', '', $data['payment']);
        $result = $total - $payment;
        $dataPay = [
            'detailexport_id' => $data['detailexport_id'],
            'billSale_id' => $data['billSale_id'],
            'guest_id' => $data['guest_id'],
            'payment_date' => $data['date_pay'],
            'total' => $result,
            'payment' => $payment,
            'debt' => 0,
            'status' => 1,
            'created_at' => $data['date_pay'],
        ];
        $detailExport = DetailExport::where('id', $data['detailexport_id'])->first();
        if ($detailExport) {
            $detailExport->update([
                'status_pay' => 2,
            ]);
        }
        $bill_sale = BillSale::where('id', $data['billSale_id'])->first();
        if ($bill_sale) {
            $bill_sale->update([
                'status' => 2,
            ]);
        }
        $payExport = new PayExport($dataPay);
        $payExport->save();
        return $payExport;
    }
}