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
        if ($payment && $payment->status == 1) {
            $dataPayment = [
                'payment_date' => $data['payment_date'],
                'payment' => $payment->payment + str_replace(',', '', $data['payment']),
                'debt' => $payment->total - ($payment->payment + str_replace(',', '', $data['payment'])),
                'status' =>  $payment->total - ($payment->payment + str_replace(',', '', $data['payment'])) <= 0 ? 2 : 1,
            ];
            PayOder::where('id', $payment->id)->update($dataPayment);
            $total = 0;
            if ($payment->total - ($payment->payment + str_replace(',', '', $data['payment'])) == 0) {
                $total = str_replace(',', '', $data['payment']);
            } else {
                $total = $payment->payment + str_replace(',', '', $data['payment']);
            }
            $this->calculateDebt($payment->provide_id, $total);
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
            'payment' => $data['payment'] == null ? 0 : str_replace(',','',$data['payment']),
            'debt' => $total - ($data['payment'] == null ? 0 : str_replace(',','',$data['payment'])),
        ];
        DB::table($this->table)->insert($dataPayment);
        DB::table('reciept')->where('id', $reciept->id)->update([
            'status' => 2,
        ]);
        $this->updateStatus($reciept->detailimport_id, Reciept::class, 'status_pay');
    }
    public function updateStatus($id, $nameDB, $dataupdate)
    {
        $check_status = true;
        $reciept = $nameDB::findOrFail($id);
        $allBill = $nameDB::where('detailimport_id', $reciept->detailimport_id)->get();
        $allProduct = QuoteImport::where('detailimport_id', $reciept->detailimport_id)->get();
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
            DB::table('detailimport')->where('id', $reciept->detailimport_id)->update([
                $dataupdate => 2
            ]);
        } else {
            DB::table('detailimport')->where('id', $reciept->detailimport_id)->update([
                $dataupdate => 1
            ]);
        }
    }


    public function calculateDebt($provide_id, $total)
    {
        $provide = DB::table('provides')->where('id', $provide_id)->first();
        if ($provide) {
            $debt = $provide->provide_debt - $total;
            $dataProvide = [
                'provide_debt' => $debt,
            ];
            Provides::where('id', $provide_id)->update($dataProvide);
        }
    }
}
