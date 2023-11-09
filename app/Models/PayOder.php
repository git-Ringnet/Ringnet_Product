<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PayOder extends Model
{
    use HasFactory;
    protected $table = 'pay_order';
    protected $fillable = [
        'detailimport_id',
        'reciept_id',
        'provide_id',
        'status',
        'payment_date',
        'total',
        'payment',
        'debt',
    ];

    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }
    public function getQuotation()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function updatePayment($data, $id)
    {
        $payment = PayOder::findOrFail($id);
        if ($payment) {
            $dataPayment = [
                'payment_date' => $data['payment_date'],
                'payment' => $payment->payment + $data['payment'],
                'debt' => $payment->total - ($payment->payment + $data['payment']),
                'status' =>  $payment->total - ($payment->payment + $data['payment']) <= 0 ? 2 : 1,
            ];
            PayOder::where('id', $payment->id)->update($dataPayment);
        }
    }
    public function addNewPayment($data)
    {
        $reciept = Reciept::findOrFail($data['reciept_id']);
        $product = QuoteImport::where('receive_id', $data['reciept_id'])->get();
        $total = 0;
        foreach ($product as $item) {
            if ($item->product_ratio > 0 && $item->price_import > 0) {
                $total += (($item->product_ratio + 100) * $item->price_import / 100) * $item->product_qty;
            } else {
                $total += $item->price_export * $item->product_qty;
            }
        }
        $dataPayment = [
            'detailimport_id' => $reciept->detailimport_id,
            'reciept_id' => $data['reciept_id'],
            'provide_id' => $reciept->provide_id,
            'status' => 1,
            'payment_date' => $data['payment_date'],
            'total' => $total,
            'payment' => $data['payment'],
            'debt' => $total - $data['payment'],
        ];
        DB::table($this->table)->insert($dataPayment);
        DB::table('reciept')->where('id',$reciept->id)->update([
            'status' => 2,
        ]);
    }
}
