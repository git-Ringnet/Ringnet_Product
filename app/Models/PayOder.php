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
        'id',
        'detailimport_id',
        'reciept_id',
        'provide_id',
        'status',
        'payment_date', 'payment_code', 'payment_day',
        'total',
        'payment',
        'debt', 'created_at', 'workspace_id', 'payment_type'
    ];

    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }

    public function getNameUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getQuotation()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function getHistoryPayment()
    {
        // return $this->hasMany(HistoryPaymentOrder::class, 'payment_id', 'id');
        return $this->hasMany(HistoryPaymentOrder::class, 'provide_id', 'provide_id');
    }

    public function getHistoryPaymentByID()
    {
        return $this->hasMany(HistoryPaymentOrder::class, 'payment_id', 'id');
    }

    public function getHistoryPay()
    {
        return $this->hasOne(HistoryPaymentOrder::class, 'payment_id', 'id')->latest();
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
                'payment_code' => $data['payment_code'],
                'payment_day' => $data['payment_day'],
                'payment_type' => $data['payment_type']
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
            $this->calculateDebt($payment->provide_id, 0, $prepay, $payment->detailimport_id);
            // Cập nhật trạng thái thanh toán
            $status = $this->updateStatusDebt($data, $payment->id, 2);

            // Cập nhật trạng thái đơn hàng
            $this->updateStatus($payment->detailimport_id, PayOder::class, 'payment_qty', 'status_pay');
        } else {
            $dataPayment = [
                'payment_date' => $data['payment_date'],
                'payment_code' => $data['payment_code'],
                'payment_day' => $data['payment_day'],
                'payment_type' => $data['payment_type']
            ];
            PayOder::where('id', $payment->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update($dataPayment);
            $result = true;
        }
        return $result;
    }

    public function updateDebtProvide($provide_id, $total, $stDebt, $prepay)
    {
        $provide = Provides::where('id', $provide_id)->first();
        if ($provide) {
            if ($stDebt == 1) {
                $debt = $provide->provide_debt - $total;
            } else {
                $debt = $provide->provide_debt + $prepay - $total;
            }

            DB::table('provides')->where('id', $provide->id)->update(
                ['provide_debt' => $debt]
            );
        }
    }


    public function addNewPayment($data, $id)
    {
        $total = 0;
        $total_tax = 0;
        $sum = 0;
        $temp = 0;
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
                // Lây mã thanh toán hiện tại
                $count = PayOder::where('workspace_id', Auth::user()->current_workspace)->count();

                $lastReceive = PayOder::where('workspace_id', Auth::user()->current_workspace)
                    ->orderBy('id', 'desc')
                    ->first();

                if ($lastReceive) {
                    $parts = explode('-', $lastReceive->payment_code);
                    $getNumber = end($parts);
                    $count = (int)$getNumber + 1;
                } else {
                    $count = $count == 0 ? $count += 1 : $count;
                }
                if ($count < 10) {
                    $count = "0" . $count;
                }
                $resultNumber = "MTT-" . $count;


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
                    'payment_code' => isset($data['payment_code']) ? $data['payment_code'] : $resultNumber,
                    'payment_day' => isset($data['payment_day']) ? Carbon::parse($data['payment_day']) : Carbon::now(),
                    'payment_type' => $data['payment_type'],
                    'user_id' => Auth::user()->id
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
                                $total_tax += ($price_export * $productImport->product_qty) * ($product->product_tax == 99 ? 0 : $product->product_tax) / 100;
                            }
                        }
                        $sum = round($total) + round($total_tax);
                        $temp = $sum;
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
            $prepay = isset($data['payment']) ?  str_replace(',', '', $data['payment']) : 0;
            // Cập nhật trạng thái đơn hàng
            // tính dư nợ nhà cung cấp
            if ($detail->status == 1) {
                $detail->status = 0;
                $detail->save();
            }

            if ($detail) {
                $this->calculateDebt($detail->provide_id, $temp, $prepay, $detail->id);
                $detail->status_debt = 1;
                $detail->save();
            }

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

        // Chỉnh trạng thái đơn mua hàng
        $payorder = PayOder::where('detailimport_id', $id)->first();
        if ($payorder) {
            if ($payorder->payment == 0) {
                $status = 0;
            }
        }

        $dataUpdate = [
            $columStatus => $status
        ];

        if ($status == 2 && $detail->status_receive == 2 && $detail->status_reciept == 2) {
            $dataUpdate['status'] = 2;
        }
        DB::table('detailimport')->where('id', $detail->id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->update($dataUpdate);
    }


    public function calculateDebt($provide_id, $temp, $total, $detail_id)
    {
        $provide = DB::table('provides')->where('id', $provide_id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($provide) {
            // Kiểm tra tình trạng đơn mua hàng
            $detail = DetailImport::where('id', $detail_id)->first();
            if ($detail) {
                if ($detail->status == 1) {
                    $debt = $provide->provide_debt + $temp;
                } else {
                    if ($detail->status_debt == 0) {
                        $debt = $provide->provide_debt + $temp - $total;
                    } else {
                        $debt = $provide->provide_debt - $total;
                    }
                }
            }

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
        $startDate = Carbon::now()->startOfDay();
        $endDate = isset($data['payment_date']) ? Carbon::parse($data['payment_date']) : Carbon::now();
        $endDate = Carbon::parse($endDate);
        $daysDiffss = $startDate->diffInDays($endDate);
        $payorder = PayOder::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($endDate < $startDate) {
            $daysDiff = -$daysDiffss;
        } else {
            $daysDiff = $daysDiffss;
        }


        if ($daysDiff <= 3 && $daysDiff > 0) {
            $status = 3; // Đến hạn trong
        } elseif ($daysDiff == 0) {
            $status = 5; // Đến hạn
        } elseif ($daysDiff < 0) {
            $status = 4; // Quá hạn
        } else {
            if ($check == 1) {
                if ($data['payment'] > 0) {
                    $status = 6; // Đặt cọc
                } else {
                    $status = 1; // Chưa thanh toán, thanh toán 1 phần
                }
            } else {
                // Tình trạng đặt cọc trả về chưa thanh toán
                if ($payorder->status == 6) {
                    if ($data['payment'] > 0) {
                        $status = 1;
                    } else {
                        $status = 6;
                    }
                } else {
                    // Lịch sử giao dịch > 2 
                    $countHistory = DB::table('history_payment_order')->where('payment_id', $payorder->id)->count();
                    if ($countHistory < 1) {
                        if ($payorder->payment > 0) {
                            $status = 6;
                        } else {
                            $status = 1;
                        }
                    } else {
                        $status = 1;
                    }
                }
            }
        }

        if ($payorder) {
            if (($payorder->total - $payorder->payment) == 0) {
                $status = 2; //Thanh toán đủ
            }
            if ($data['payment'] > 0 || $payorder->status != $status) {
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
            }
            $prepay = $payment->payment;
            // Xóa lịch sử
            HistoryPaymentOrder::where('payment_id', $payment->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->delete();

            // Xóa thanh toán
            DB::table('pay_order')->where('id', $payment->id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->delete();

            // Xóa file đính kèm
            // DB::table('attachment')->where('table_id', $payment->id)
            //     ->where('table_name', 'TTMH')
            //     ->where('workspace_id', Auth::user()->current_workspace)
            //     ->delete();

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
                $stDetail = 0;
                $stDebt = 1;
            } else {
                $stDetail = 1;
                $stDebt = 0;
            }
            $detailImport = DetailImport::where('id', $detail)->first();
            DB::table('detailimport')->where('id', $detail)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update([
                    'status_pay' => 0,
                    'status' => $stDetail,
                    'status_debt' => $stDebt
                ]);

            // Xóa dư nợ nhà cung cấp nếu tình trạng là 1  
            if ($detailImport) {
                if ($stDetail == 1) {
                    $stDebt == $detailImport->status_debt ? $status_debt = 1 : $status_debt = 2;
                    $this->updateDebtProvide($detailImport->provide_id, $detailImport->total_tax, $status_debt, $prepay);
                } else {
                    $provide = Provides::where('id', $detailImport->provide_id)->first();
                    if ($provide) {
                        $debt = $provide->provide_debt + $prepay;
                        $provide->provide_debt = $debt;
                        $provide->save();
                    }
                }
            }

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
    public function provideStatistics()
    {
        $report_provide = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', '=', 'detailimport.provide_id')
            ->whereIn('detailimport.status', [0, 2])
            ->select(
                'detailimport.provide_id as provide_id',
                'provides.provide_name_display as provide_name',
                'provides.provide_code as provide_code',
                'provides.id',
                DB::raw('SUM(detailimport.total_tax) as sumSell'),
                DB::raw('provides.provide_debt as sumAmountOwed')
            )
            ->groupBy('detailimport.provide_id', 'provides.provide_name_display', 'provides.provide_code', 'provides.id', 'provides.provide_debt')
            ->get();
        return $report_provide;
    }

    public function getProvidersWithDebt()
    {
        $providersWithDebt = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', '=', 'detailimport.provide_id')
            ->whereIn('detailimport.status', [0, 2])
            ->where('provides.provide_debt', '>', 0)
            ->select(
                'detailimport.provide_id as provide_id',
                'provides.provide_name_display as provide_name',
                'provides.provide_code as provide_code',
                'provides.id',
                DB::raw('SUM(detailimport.total_tax) as totalPayments'),
                'provides.provide_debt as totalDebt'
            )
            ->groupBy('detailimport.provide_id', 'provides.provide_name_display', 'provides.provide_code', 'provides.id', 'provides.provide_debt')
            ->havingRaw('SUM(detailimport.total_tax) > 0')
            ->get();

        return $providersWithDebt;
    }

    public function ajax($data)
    {
        $report_provide = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', '=', 'detailimport.provide_id')
            ->whereIn('detailimport.status', [0, 2])
            ->select(
                'detailimport.provide_id as provide_id',
                'provides.provide_name_display as provide_name',
                'provides.provide_code as provide_code',
                'provides.id',
                DB::raw('SUM(detailimport.total_tax) as sumSell'),
                DB::raw('provides.provide_debt as sumAmountOwed')
            );
        $report_provide = $report_provide->groupBy('detailimport.provide_id', 'provides.provide_name_display', 'provides.provide_code', 'provides.id', 'provides.provide_debt');

        if (isset($data['search'])) {
            $report_provide = $report_provide->where(function ($query) use ($data) {
                $query->orWhere('provides.provide_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provides.provide_code', 'like', '%' . $data['search'] . '%');
            });
        }
        // Mã nhà cung cấp
        if (isset($data['code'])) {
            $report_provide = $report_provide->where('provides.provide_code', 'like', '%' . $data['code'] . '%');
        }
        // Công ty
        if (isset($data['name'])) {
            $report_provide = $report_provide->whereIn('provides.id', $data['name']);
        }
        // Tổng doanh số
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $report_provide = $report_provide->having('sumSell', $data['total'][0], $data['total'][1]);
        }
        // Công nợ
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $report_provide = $report_provide->having('provides.provide_debt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $report_provide = $report_provide->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $report_provide = $report_provide->get();
        return $report_provide;
    }
    public function getUserInPayOrder()
    {
        $pay_order = PayOder::leftJoin('detailimport', 'pay_order.detailimport_id', 'detailimport.id')
            ->where('pay_order.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('users', 'pay_order.user_id', 'users.id')->distinct('guest.id')
            ->select('*', 'users.*')
            ->get();
        return $pay_order;
    }
    public function code_paymentById($data)
    {
        $pay_order = DB::table($this->table);
        if (isset($data)) {
            $pay_order = $pay_order->whereIn('id', $data);
        }
        $pay_order = $pay_order->pluck('payment_code')->all();
        return $pay_order;
    }
    public function ajax1($data)
    {
        $payment = DB::table($this->table)
            ->leftJoin('detailimport', 'pay_order.detailimport_id', 'detailimport.id')
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->select('provides.provide_name_display as provide_name_display', 'pay_order.*', 'detailimport.quotation_number as quotation_number')
            ->where('pay_order.workspace_id', Auth::user()->current_workspace);

        if (isset($data['search'])) {
            $payment = $payment->where(function ($query) use ($data) {
                $query->orWhere('pay_order.payment_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provide_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['quotenumber'])) {
            $payment = $payment->where('quotation_number', 'like', '%' . $data['quotenumber'] . '%');
        }
        if (isset($data['provides'])) {
            $payment = $payment->where('detailimport.provide_name', 'like', '%' . $data['provides'] . '%');
        }
        if (isset($data['payment_code'])) {
            $payment = $payment->whereIn('pay_order.id', $data['payment_code']);
        }
        if (isset($data['users'])) {
            $payment = $payment->whereIn('pay_order.user_id', $data['users']);
        }
        if (isset($data['status']) && is_array($data['status'])) {
            if (in_array(7, $data['status'])) {
                $payment = $payment->where(function ($query) {
                    $query->where('pay_order.status', 1)
                        ->where('pay_order.payment', '>', 0);
                });
                $payment = $payment->orWhere(function ($query) use ($data) {
                    $dataWithout7 = array_diff($data['status'], [7]);
                    $query->orWhereIn('pay_order.status', $dataWithout7);
                });
            } else {
                $payment = $payment->whereIn('pay_order.status', $data['status']);
            }
        }
        if (isset($data['payment'][0]) && isset($data['payment'][1])) {
            $payment = $payment->where('pay_order.payment', $data['payment'][0], $data['payment'][1]);
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $payment = $payment->where('pay_order.debt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $payment = $payment->where('pay_order.total', $data['total'][0], $data['total'][1]);
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $payment = $payment->whereBetween('pay_order.payment_date', [$dateStart, $dateEnd]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $payment = $payment->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $payment = $payment->get();
        return $payment;
    }
}
