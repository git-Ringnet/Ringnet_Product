<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
    public function getHistoryPayment()
    {
        return $this->hasMany(HistoryPaymentOrder::class, 'payment_id', 'id');
    }

    public function updatePayment($data, $id)
    {
        $result = true;
        $payment = PayOder::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();

        if ($payment && $payment->status != 2) {
            $prepay = $payment->payment + (isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0);
            $dataPayment = [
                'payment_date' => $data['payment_date'],
                'payment' => $prepay,
                'debt' => ($payment->total - $prepay),
                'payment_code' => $data['payment_code']
            ];
            PayOder::where('id', $payment->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataPayment);
            $total = 0;
            if ($payment->total - ($payment->payment + (isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0)) == 0) {
                $total = isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0;
            } else {
                $total = $payment->payment + (isset($data['payment']) ?  str_replace(',', '', $data['payment']) : 0);
            }
            $prepay = (isset($data['payment']) ?  str_replace(',', '', $data['payment']) : 0);

            // Tính công nợ nhà cung cấp
            $this->calculateDebt($payment->provide_id, $prepay);
            // Cập nhật trạng thái thanh toán
            $status = $this->updateStatusDebt($data, $payment->id, 2);

            // Cập nhật trạng thái đơn hàng
            $this->updateStatus($payment->detailimport_id, PayOder::class, 'payment_qty', 'status_pay');
        } else {
            $result = false;
        }
        return $result;
    }
    public function addNewPayment($data, $id)
    {
        $total = 0;
        $total_tax = 0;
        $sum = 0;
        $detail =  DetailImport::findOrFail($id);
        if ($detail) {
            $payment = PayOder::where('detailimport_id', $detail->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($payment) {
                $payment_id = $payment->id;
                DB::table($this->table)->where('id', $payment_id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->update([
                        'payment' => $payment->payment + (isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0),
                        'debt' => $payment->debt - (isset($data['payment']) ?  str_replace(',', '', $data['payment']) : 0)
                    ]);
            } else {
                $dataReciept = [
                    'detailimport_id' => $detail->id,
                    'provide_id' => $detail->provide_id,
                    'status' => ($data['payment'] > 0 ? 6 : 1),
                    'payment_date' => isset($data['payment_date']) ? Carbon::parse($data['payment_date']) : Carbon::now(),
                    'total' => 0,
                    'payment' => isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0,
                    'debt' => 0,
                    'created_at' => Carbon::now(),
                    'workspace_id' => Auth::user()->current_workspace,
                    'payment_code' => $data['payment_code']
                ];
                $payment_id = DB::table($this->table)->insertGetId($dataReciept);
                for ($i = 0; $i < count($data['product_name']); $i++) {
                    $dataupdate = [
                        'payOrder_id' => $payment_id,
                    ];
                    $checkQuote = QuoteImport::where('detailimport_id', $detail->id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->get();
                    if ($checkQuote) {
                        foreach ($checkQuote as $value) {
                            $productImport = ProductImport::where('quoteImport_id', $value->id)
                                ->where('payOrder_id', 0)
                                ->where('workspace_id', Auth::user()->current_workspace)
                                ->first();
                            if ($productImport) {
                                DB::table('products_import')->where('id', $productImport->id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->update($dataupdate);
                                $product = QuoteImport::where('id', $productImport->quoteImport_id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->first();
                                $price_export = $product->price_export;
                                $total += $price_export * $productImport->product_qty;
                                $total_tax += ($price_export * $productImport->product_qty) * $product->product_tax / 100;
                            }
                        }
                        $sum = $total + $total_tax;
                        DB::table($this->table)->where('id', $payment_id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->update([
                                'total' => $sum,
                                'debt' => $sum - (isset($data['payment']) ?  str_replace(',', '', $data['payment']) : 0),
                            ]);
                    }
                }
            }
            // Cập nhật tình trạng thanh toán
            $status = $this->updateStatusDebt($data, $payment_id, 1);
            // Cập nhật trạng thái đơn hàng
            if ($detail->status == 1) {
                $detail->status = 2;
                $detail->save();
            }
            $prepay = isset($data['payment']) ?  str_replace(',', '', $data['payment']) : 0;
            // tính dư nợ
            $this->calculateDebt($detail->provide_id, $prepay);
            // Cập nhật trạng thái
            $this->updateStatus($detail->id, PayOder::class, 'payment_qty', 'status_pay');
        }
        return $payment_id;
    }
    public function updateStatus($id, $table, $colum, $columStatus)
    {
        $check = false;
        $detail = DetailImport::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        $product = QuoteImport::where('detailimport_id', $detail->id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        foreach ($product as $item) {
            if ($item->product_qty != $item->$colum) {
                $check = true;
                break;
            }
        }
        $receive = $table::where('detailimport_id', $detail->id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
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
        DB::table('detailimport')->where('id', $detail->id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->update($dataUpdate);
    }


    public function calculateDebt($provide_id, $total)
    {
        $provide = DB::table('provides')->where('id', $provide_id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($provide) {
            $debt = $provide->provide_debt - $total;
            $dataProvide = [
                'provide_debt' => $debt,
            ];
            Provides::where('id', $provide->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataProvide);
        }
    }

    public function formatDate($data)
    {
        return Carbon::parse($data);
    }

    public function updateStatusDebt($data, $id, $check)
    {
        // dd($id);
        $startDate = Carbon::now()->startOfDay();
        $endDate = isset($data['payment_date']) ? Carbon::parse($data['payment_date']) : Carbon::now();
        $endDate = Carbon::parse($endDate);
        $daysDiffss = $startDate->diffInDays($endDate);

        if ($endDate < $startDate) {
            $daysDiff = -$daysDiffss;
        } else {
            $daysDiff = $daysDiffss;
        }

        if ($daysDiff <= 3 && $daysDiff > 0) {
            $status = 3; //Đến hạn trong
        } elseif ($daysDiff == 0) {
            $status = 5; //Đến hạn
        } elseif ($daysDiff < 0) {
            $status = 4; //Quá hạn
        } else {
            if ($check == 1 && $data['payment'] > 0) {
                $status = 6; // Đặt cọc
            } else {
                $status = 1; //Chưa thanh toán
            }
        }
        // $payorder = PayOder::where('detailimport_id', $id)
        //     ->where('workspace_id', Auth::user()->current_workspace)
        //     ->first();
        $payorder = PayOder::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($payorder) {
            // dd(1);
            // $getStatus = HistoryPaymentOrder::where('payment_id', $payorder->id)->count();
            // return $getStatus;
            // if ($getStatus == 2) {
            //     $status = 6;
            // }
            if (($payorder->total - $payorder->payment) == 0) {
                $status = 2; //Thanh toán đủ
            }
            if ($data['payment'] > 0) {
                DB::table('pay_order')->where('id', $id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->update([
                        'status' => $status,
                    ]);
            }
        }

        return $status;
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
    }
    public function deletePayment($id)
    {
        $status = false;
        $payment = DB::table($this->table)->where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($payment) {
            $detail = $payment->detailimport_id;
            $productImport = ProductImport::where('payOrder_id', $payment->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            if ($productImport) {
                foreach ($productImport as $item) {
                    $quoteImport = QuoteImport::where('id', $item->quoteImport_id)
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
                    if ($quoteImport) {
                        $dataUpdate = [
                            'payment_qty' => $quoteImport->payment_qty - $item->product_qty
                        ];
                        DB::table('quoteimport')->where('id', $quoteImport->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->update($dataUpdate);
                    }
                }
                // Tính dư nợ nhà cung cấp
                if ($payment->payment > 0) {
                    $provide = Provides::where('id', $payment->provide_id)->first();
                    if ($provide) {
                        $dataProvide = [
                            'provide_debt' => ($provide->provide_debt + $payment->payment),
                        ];
                        DB::table('provides')->where('id', $provide->id)
                            ->where('workspace_id', Auth::user()->current_workspace)
                            ->update($dataProvide);
                    }
                }
            }

            // Xóa lịch sử
            HistoryPaymentOrder::where('payment_id', $payment->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->delete();

            // Xóa thanh toán
            DB::table('pay_order')->where('id', $payment->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->delete();

            // Cập nhật lại trạng thái đơn hàng
            $checkReceive = Receive_bill::where('detailimport_id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $checkReciept = Reciept::where('detailimport_id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            $checkPayment = PayOder::where('detailimport_id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($checkReceive || $checkReciept || $checkPayment) {
                $stDetail = 2;
            } else {
                $stDetail = 1;
            }


            DB::table('detailimport')->where('id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update([
                    'status_pay' => 0,
                    'status' => $stDetail
                ]);

            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
    public function getPaymentOrder($id)
    {
        return QuoteImport::leftJoin('detailimport', 'detailimport.id', 'quoteimport.detailimport_id')
            ->leftJoin('pay_order', 'detailimport.id', 'pay_order.detailimport_id')
            ->where('quoteimport.detailimport_id', $id)
            ->where('quoteimport.workspace_id', Auth::user()->current_workspace)
            // ->where('product_qty', '>', DB::raw('COALESCE(payment_qty,0)'))
            ->get();
    }
}
