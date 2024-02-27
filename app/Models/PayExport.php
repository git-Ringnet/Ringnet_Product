<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        'workspace_id',
        'created_at',
        'updated_at'
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
        $detailExport = DetailExport::find($data['detailexport_id']);
        if (isset($data['total'])) {
            $total = $data['total'];
            if ($total !== null) {
                $total = str_replace(',', '', $total);
            }
        } else {
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
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => Carbon::now(),
        ];
        $payExport = new PayExport($dataPay);
        $payExport->save();
        $detailExport->status = 2;
        $detailExport->save();
        if ($result == 0) {
            $payExport->update([
                'status' => 2,
            ]);
            $detailExport->amount_owed = $result;
            $detailExport->status_pay = 2;
            $detailExport->save();
            if ($detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
                $detailExport->update([
                    'status' => 3,
                ]);
            }
        } elseif ($result > 0) {
            $detailExport->amount_owed = $result;
            $detailExport->save();
        }
        if (isset($data['payment'])) {
            $history = new history_Pay_Export;
            $history->pay_id = $payExport->id;
            $history->total = $total;
            $history->payment = $payment;
            $history->debt = $result;
            $history->workspace_id = Auth::user()->current_workspace;
            $history->save();
            $payExport->update([
                'payment' => $payment,
            ]);
            if ($payment > 0 && $payment < $result) {
                $detailExport->status_pay = 3;
                $detailExport->save();
            } else if ($payment == 0) {
                $detailExport->status_pay = 1;
                $detailExport->save();
            }
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
                if ($payment > 0) {
                    $payExport->update([
                        'status' => 5,
                    ]);
                }
            }
        }
        $history = new history_Pay_Export;
        $history->pay_id = $payExport->id;
        $history->total = $total;
        $history->payment = $payment;
        $history->debt = $detailExport->amount_owed;
        $history->workspace_id = Auth::user()->current_workspace;
        $history->created_at = now();
        $history->save();
        //payment
        $payExport->payment += $payment;
        $payExport->debt = $detailExport->amount_owed;
        $payExport->payment_date = $data['date_pay'];
        $payExport->save();
        return $detailExport;
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'idTT')->where('table_name', $name)->get();
    }
    public function getProductPay($idQuote)
    {
        $delivery = DetailExport::leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.id', $idQuote)
            ->whereRaw('COALESCE(quoteexport.product_qty, 0) - COALESCE(quoteexport.qty_payment, 0) > 0')
            ->get();
        return $delivery;
    }
    public function deletePayExport($id)
    {
        $payExport = PayExport::find($id);
        QuoteExport::where('detailexport_id', $payExport->detailexport_id)
            ->update([
                'qty_payment' => 0,
            ]);
        productPay::where('pay_id', $id)->delete();
        DetailExport::where('id', $payExport->detailexport_id)
            ->update([
                'amount_owed' => $payExport->total,
            ]);
        $PayCount = productPay::where('pay_export.detailexport_id', $payExport->detailexport_id)
            ->leftJoin('pay_export', 'product_pay.pay_id', 'pay_export.id')
            ->count();
        if ($PayCount > 0) {
            DetailExport::where('id', $payExport->detailexport_id)
                ->update([
                    'status_pay' => 3,
                ]);
        } else {
            DetailExport::where('id', $payExport->detailexport_id)
                ->update([
                    'status_pay' => 1,
                ]);
        }
        $BillCount = productBill::where('bill_sale.detailexport_id', $payExport->detailexport_id)
            ->leftJoin('bill_sale', 'product_bill.billSale_id', 'bill_sale.id')
            ->count();
        $deliveredCount = Delivered::where('delivery.detailexport_id', $payExport->detailexport_id)
            ->leftJoin('delivery', 'delivered.delivery_id', 'delivery.id')
            ->count();
        if ($deliveredCount == 0 && $BillCount == 0 && $PayCount == 0) {
            DetailExport::where('id', $payExport->detailexport_id)
                ->update([
                    'status' => 1,
                ]);
        } else {
            DetailExport::where('id', $payExport->detailexport_id)
                ->update([
                    'status' => 2,
                ]);
        }
        history_Pay_Export::where('pay_id', $id)->delete();
        PayExport::find($id)->delete();
    }
    public function sumPay($id)
    {
        $sumPay = PayExport::leftJoin('guest', 'guest.id', 'pay_export.guest_id')
            ->where('guest_id', $id)
            ->sum('pay_export.payment');
        return $sumPay;
    }
}
