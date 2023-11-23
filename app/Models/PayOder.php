<?php

namespace App\Models;

use Carbon\Carbon;
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
        $result = true;
        $payment = PayOder::where('id', $id)->first();

        $status = $this->updateStatusDebt($data);

        if ($payment && $payment->status != 2) {
            $dataPayment = [
                'payment_date' => $data['payment_date'],
                'payment' => $payment->payment + str_replace(',', '', $data['payment']),
                'debt' => $payment->total - ($payment->payment + str_replace(',', '', $data['payment'])),
                'status' =>  $payment->total - ($payment->payment + str_replace(',', '', $data['payment'])) <= 0 ? 2 : $status,
            ];
            PayOder::where('id', $payment->id)->update($dataPayment);
            $total = 0;
            if ($payment->total - ($payment->payment + str_replace(',', '', $data['payment'])) == 0) {
                $total = str_replace(',', '', $data['payment']);
            } else {
                $total = $payment->payment + str_replace(',', '', $data['payment']);
            }
            $this->calculateDebt($payment->provide_id, $total);
            $this->updateStatus($payment->detailimport_id, PayOder::class, 'payment_qty', 'status_pay');
        } else {
            $result = false;
        }
        return $result;
    }
    public function addNewPayment($data, $id)
    {
        $total = 0;
        // $startDate = Carbon::now()->startOfDay();
        // $endDate = $data['payment_date'] == null ? Carbon::now() : Carbon::parse($data['payment_date']);
        // $endDate = Carbon::parse($endDate);
        // $daysDiffss = $startDate->diffInDays($endDate);
        // if ($endDate < $startDate) {
        //     $daysDiff = -$daysDiffss;
        // } else {
        //     $daysDiff = $daysDiffss;
        // }
    
        // if($daysDiff <= 3 && $daysDiff > 0){
        //     $status = 3;
        // }elseif($daysDiff == 0){
        //     $status = 5;
        // }elseif($daysDiff < 0){
        //     $status = 4;
        // }else{
        //     $status = 1;
        // }
        $status = $this->updateStatusDebt($data);

        $detail =  DetailImport::findOrFail($id);
        if ($detail) {
            $dataReciept = [
                'detailimport_id' => $detail->id,
                'provide_id' => $detail->provide_id,
                'status' => $status,
                'payment_date' => $data['payment_date'] == null ? Carbon::now() : Carbon::parse($data['payment_date']),
                'total' => 0,
                'payment' => isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0,
                'debt' => 0,
                'created_at' => Carbon::now(),
            ];
            $payment_id = DB::table($this->table)->insertGetId($dataReciept);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $dataupdate = [
                    'payOrder_id' => $payment_id,
                ];
                $checkQuote = QuoteImport::where('detailimport_id', $detail->id)->get();
                if ($checkQuote) {
                    foreach ($checkQuote as $value) {
                        $productImport = ProductImport::where('quoteImport_id', $value->id)
                            ->where('payOrder_id', 0)->first();
                        if ($productImport) {
                            DB::table('products_import')->where('id', $productImport->id)->update($dataupdate);
                            $product = QuoteImport::where('id', $productImport->quoteImport_id)->first();
                            if ($product->product_ratio > 0 && $product->price_import > 0) {
                                $price_export = ($product->product_ratio + 100) * $product->price_import / 100;
                                $total += $price_export * $productImport->product_qty;
                            } else {
                                $price_export = $product->price_export;
                                $total += $price_export * $productImport->product_qty;
                            }
                        }
                    }
                    DB::table($this->table)->where('id', $payment_id)->update([
                        'total' => $total,
                        'debt' => $total - (isset($data['payment']) ?  str_replace(',', '', $data['payment']) : 0),
                    ]);
                }
            }
            // Cập nhật trạng thái đơn hàng
            if ($detail->status == 1) {
                $detail->status = 2;
                $detail->save();
            }
            return $payment_id;
        }
    }
    public function updateStatus($id, $table, $colum, $columStatus)
    {
        $check = false;
        $detail = DetailImport::where('id', $id)->first();
        $product = QuoteImport::where('detailimport_id', $detail->id)->get();
        foreach ($product as $item) {
            if ($item->product_qty != $item->$colum) {
                $check = true;
                break;
            }
        }
        $receive = $table::where('detailimport_id', $detail->id)->get();
        foreach ($receive as $value) {
            if ($value->status != 2) {
                $check = true;
                break;
            }
        }
        if ($check) {
            $status = 1;
        } else {
            $status = 2;
        }
        $dataUpdate = [
            $columStatus => $status
        ];
        DB::table('detailimport')->where('id', $detail->id)->update($dataUpdate);
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

    public function formatDate($data){
        return Carbon::parse($data);
    }

    public function updateStatusDebt($date) {
        $startDate = Carbon::now()->startOfDay();
        $endDate = $date['payment_date'] == null ? Carbon::now() : Carbon::parse($date['payment_date']);
        $endDate = Carbon::parse($endDate);
        $daysDiffss = $startDate->diffInDays($endDate);

        if ($endDate < $startDate) {
            $daysDiff = -$daysDiffss;
        } else {
            $daysDiff = $daysDiffss;
        }

        if($daysDiff <= 3 && $daysDiff > 0){
            $status = 3;
        }elseif($daysDiff == 0){
            $status = 5;
        }elseif($daysDiff < 0){
            $status = 4;
        }else{
            $status = 1;
        }

        return $status;
    }
}
