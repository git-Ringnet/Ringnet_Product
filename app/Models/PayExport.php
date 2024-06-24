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
        'id',
        'user_id',
        'detailexport_id',
        'guest_id',
        'code_payment',
        'payment_date',
        'total',
        'payment',
        'debt',
        'payment_day',
        'payment_type',
        'status',
        'workspace_id',
        'created_at',
        'updated_at'
    ];
    protected $table = 'pay_export';

    public function getHistoryPay()
    {
        return $this->hasOne(history_Pay_Export::class, 'pay_id', 'id')
            ->orderBy('id', 'desc');
        // ->latest();
    }
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

    public function addPayExport($data, $export_id)
    {
        $detailExport = DetailExport::find($export_id);

        // Ensure numeric values
        $total = isset($data['total']) ? str_replace(',', '', $data['total']) : $detailExport->amount_owed;
        if (isset($data['checkPayment'])) {
            if ($data['checkPayment'] == 1) {
                $payment = $detailExport->amount_owed;
            }
        } else {
            $payment = isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0;
        }
        $date_pay = isset($data['date_pay']) ? Carbon::parse($data['date_pay']) : Carbon::now();
        $payment_day = isset($data['payment_day']) ? Carbon::parse($data['payment_day']) : Carbon::now();

        $result = $total - $payment;

        $status = null;

        // Kiểm tra xem ngày thanh toán có phải là ngày hôm nay hay không
        $datePayIsToday = $date_pay->isToday();

        // Kiểm tra ngày hiện tại trừ 3 ngày
        $nowMinus3Days = Carbon::now()->subDays(3);

        // Kiểm tra ngày hiện tại cộng 3 ngày
        $nowPlus4Days = Carbon::now()->addDays(3);

        // Kiểm tra các điều kiện
        if ($result == 0) {
            // Nếu kết quả bằng 0
            $status = 2;
        } elseif ($datePayIsToday) {
            // Nếu ngày thanh toán là ngày hôm nay
            $status = 6;
        } elseif ($result > 0) {
            // Nếu kết quả lớn hơn 0
            if ($date_pay->lessThan(Carbon::now())) {
                // Nếu ngày thanh toán nhỏ hơn ngày hiện tại
                $status = 4;
            } elseif ($date_pay->greaterThan($nowPlus4Days)) {
                // Nếu ngày thanh toán lớn hơn ngày hiện tại cộng 3 ngày
                $status = 1;
            } else {
                // Nếu ngày thanh toán nằm trong khoảng từ 3 ngày trở xuống đến ngày hiện tại
                $status = 3;
            }
        }

        $lastPayExportId = DB::table('pay_export')
            ->where('workspace_id', Auth::user()->current_workspace)
            ->max(DB::raw('CAST(SUBSTRING_INDEX(code_payment, "-", -1) AS UNSIGNED)'));
        $lastPayExportId = $lastPayExportId ? $lastPayExportId + 1 : 1;

        $dataPay = [
            'detailexport_id' => $export_id,
            'user_id' => Auth::user()->id,
            'guest_id' => $data['guest_id'],
            'code_payment' => isset($data['code_payment']) && $data['code_payment'] != null ? $data['code_payment'] : "MTT-" . $lastPayExportId,
            'payment_date' => $date_pay,
            'total' => $total,
            'payment' => $payment,
            'debt' => $result,
            'payment_day' => $payment_day,
            'payment_type' => isset($data['payment_type']) && $data['payment_type'] != null ? $data['payment_type'] : "Tiền mặt",
            'status' => $status,
            'created_at' => Carbon::now(),
            'workspace_id' => Auth::user()->current_workspace,
        ];

        // Use create method instead of new + save
        $payExport = PayExport::create($dataPay);

        // Update detailExport in a single query
        $detailExport->update([
            'amount_owed' => max(0, $result),
        ]);

        if ($payment > 0 && $result > 0) {
            $detailExport->update([
                'status_pay' => 3,
                'status' => 2,
            ]);
        } else if ($result == 0) {
            $detailExport->update([
                'status_pay' => 2,
                'status' => 2,
            ]);
        } else {
            $detailExport->update([
                'status' => 2,
                'status_pay' => 1,
            ]);
        }

        // Check if additional conditions are met to update status in detailExport
        if ($result == 0 && $detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
            $detailExport->update(['status' => 3]);
        }

        // Create history only if payment is set
        $historyData = [
            'pay_id' => $payExport->id,
            'total' => $total,
            'user_id' => Auth::user()->id,
            'payment' => $payment,
            'payment_type' => isset($data['payment_type']) && $data['payment_type'] != null ? $data['payment_type'] : "Tiền mặt",
            'debt' => $result,
            'created_at' => $payment_day,
            'workspace_id' => Auth::user()->current_workspace,
        ];

        // Use create method instead of new + save
        history_Pay_Export::create($historyData);

        // Update payment in payExport
        $payExport->update(['payment' => $payment]);

        return $payExport->id;
    }

    public function updateDetailExport($data, $detailexport_id)
    {
        $payment_day = isset($data['payment_day']) ? Carbon::parse($data['payment_day']) : Carbon::now();
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
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->first();
        $detailExport = DetailExport::where('id', $detailexport_id)
            ->where('workspace_id', Auth::user()->current_workspace)->first();
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
                if ($payment > 0) {
                    $payExport->update([
                        'status' => 5,
                    ]);
                    $detailExport->update([
                        'status_pay' => 3,
                    ]);
                }
            }
        }

        $existingHistory = history_Pay_Export::where('pay_id', $payExport->id)
            ->where('debt', $detailExport->amount_owed)
            ->exists();

        if (!$existingHistory) {
            // Thêm mới bản ghi nếu không tồn tại
            $history = new history_Pay_Export;
            $history->pay_id = $payExport->id;
            $history->total = $total;
            $history->payment = $payment;
            $history->payment_type = $data['payment_type'];
            $history->debt = $detailExport->amount_owed;
            $history->created_at = $payment_day;
            $history->workspace_id = Auth::user()->current_workspace;
            $history->save();
        }
        //
        $countHistory = history_Pay_Export::where('pay_id', $payExport->id)->count();
        $date_pay = isset($data['date_pay']) ? Carbon::parse($data['date_pay']) : Carbon::now();
        $status = null;

        // Kiểm tra xem ngày thanh toán có phải là ngày hôm nay hay không
        $datePayIsToday = $date_pay->isToday();

        // Kiểm tra ngày hiện tại cộng 3 ngày
        $nowPlus4Days = Carbon::now()->addDays(3);

        // Kiểm tra các điều kiện
        if ($result == 0) {
            // Nếu kết quả bằng 0
            $status = 2;
        } elseif ($datePayIsToday) {
            // Nếu ngày thanh toán là ngày hôm nay
            $status = 6;
        } elseif ($result > 0) {
            // Nếu kết quả lớn hơn 0
            if ($date_pay->lessThan(Carbon::now())) {
                // Nếu ngày thanh toán nhỏ hơn ngày hiện tại
                $status = 4;
            } elseif ($payment == 0) {
                // Nếu ngày thanh toán lớn hơn ngày hiện tại cộng 3 ngày
                if ($daThanhToan > 0 && $date_pay->greaterThan($nowPlus4Days) && $countHistory > 1) {
                    $status = 5;
                } else if ($daThanhToan > 0 && $date_pay->greaterThan($nowPlus4Days) && $countHistory == 1) {
                    if ($payExport->status == 5) {
                        $status = 5;
                        //
                        $history = new history_Pay_Export;
                        $history->pay_id = $payExport->id;
                        $history->total = $total;
                        $history->payment = $payment;
                        $history->payment_type = $data['payment_type'];
                        $history->debt = $detailExport->amount_owed;
                        $history->created_at = $payment_day;
                        $history->workspace_id = Auth::user()->current_workspace;
                        $history->save();
                    } else {
                        $status = 1;
                    }
                } else if ($daThanhToan == 0 && $date_pay->greaterThan($nowPlus4Days)) {
                    $status = 1;
                } else if ($date_pay->lessThan(Carbon::now())) {
                    // Nếu ngày thanh toán nhỏ hơn ngày hiện tại    
                    $status = 4;
                } else if ($datePayIsToday) {
                    $status = 6;
                } else {
                    $status = 3;
                }
            } elseif ($payment > 0 && $date_pay->greaterThan($nowPlus4Days)) {
                // Nếu ngày thanh toán lớn hơn ngày hiện tại cộng 3 ngày
                $status = 5;
            } else {
                // Nếu ngày thanh toán nằm trong khoảng từ 3 ngày trở xuống đến ngày hiện tại
                $status = 3;
            }
        }

        //payment
        $payExport->payment += $payment;
        $payExport->debt = $detailExport->amount_owed;
        $payExport->payment_date = $data['date_pay'];
        $payExport->payment_day = $payment_day;
        $payExport->payment_type = $data['payment_type'];
        $payExport->status = $status;
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
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $delivery;
    }
    public function deletePayExport($id)
    {
        $payExport = PayExport::find($id);
        QuoteExport::where('detailexport_id', $payExport->detailexport_id)
            ->where('status', 1)
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
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->count();

        if ($PayCount > 0) {
            DetailExport::where('id', $payExport->detailexport_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update([
                    'status_pay' => 3,
                ]);
        } else {
            DetailExport::where('id', $payExport->detailexport_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update([
                    'status_pay' => 0,
                    'status' => 1,
                ]);
        }
        history_Pay_Export::where('pay_id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->delete();
        PayExport::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->delete();
    }
    public function sumPay($id)
    {
        $sumPay = PayExport::leftJoin('guest', 'guest.id', 'pay_export.guest_id')
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->where('guest_id', $id)
            ->sum('pay_export.payment');
        return $sumPay;
    }
    public function guestStatistics()
    {
        $subQuery = DB::table('pay_export')
            ->select('guest_id', DB::raw('SUM(payment) as totalPayment'))
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->groupBy('guest_id');

        $report_guest = DetailExport::leftJoin('guest', 'guest.id', '=', 'detailexport.guest_id')
            ->leftJoinSub($subQuery, 'pe', function ($join) {
                $join->on('guest.id', '=', 'pe.guest_id');
            })
            ->whereIn('detailexport.status', [2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select(
                'detailexport.guest_id as guest_id',
                'guest.guest_name_display as guest_name',
                'guest.guest_code as guest_code',
                'guest.id',
                DB::raw('SUM(detailexport.total_price + detailexport.total_tax) as sumSell'),
                DB::raw('SUM(detailexport.amount_owed) as sumAmountOwed'),
                DB::raw('COALESCE(pe.totalPayment, 0) as totalPayment')
            )
            ->groupBy('detailexport.guest_id', 'guest.guest_name_display', 'guest.guest_code', 'guest.id', 'pe.totalPayment')
            ->get();
        return $report_guest;
    }
    public function guestdoanhThuTop5()
    {
        $report_guest = DetailExport::leftJoin('guest', 'guest.id', '=', 'detailexport.guest_id')
            ->whereIn('detailexport.status', [2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select(
                'detailexport.guest_id as guest_id',
                'guest.guest_name_display as guest_name',
                'guest.guest_code as guest_code',
                'guest.id',
                DB::raw('SUM(detailexport.total_price + detailexport.total_tax) as sumSell'),
                DB::raw('SUM(detailexport.amount_owed) as sumAmountOwed')
            )
            ->groupBy('detailexport.guest_id', 'guest.guest_name_display', 'guest.guest_code', 'guest.id')
            ->orderByDesc('sumSell') // Sắp xếp theo doanh thu giảm dần
            ->limit(5) // Giới hạn kết quả chỉ lấy top 5
            ->get();

        return $report_guest;
    }
    public function getCompaniesWithDebt()
    {
        $companiesWithDebt = DetailExport::leftJoin('guest', 'guest.id', '=', 'detailexport.guest_id')
            ->whereIn('detailexport.status', [2, 3])
            ->where('detailexport.amount_owed', '>', 0)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select(
                'guest.guest_name_display as guest_name',
                'guest.guest_code as guest_code',
                DB::raw('SUM(detailexport.total_price + detailexport.total_tax) as sumSell'),
                DB::raw('SUM(detailexport.amount_owed) as sumAmountOwed')
            )
            ->groupBy('guest.guest_name_display', 'guest.guest_code')
            ->havingRaw('SUM(detailexport.amount_owed) > 0')
            ->get();

        return $companiesWithDebt;
    }
    public function ajax($data)
    {
        $report_guest = DetailExport::leftJoin('guest', 'guest.id', '=', 'detailexport.guest_id')
            ->whereIn('detailexport.status', [2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select(
                'detailexport.guest_id as guest_id',
                'guest.guest_name_display as guest_name',
                'guest.guest_code as guest_code',
                'guest.id',
                DB::raw('SUM(detailexport.total_price + detailexport.total_tax) as sumSell'),
                DB::raw('SUM(detailexport.amount_owed) as sumAmountOwed')
            );
        $report_guest = $report_guest->groupBy('detailexport.guest_id', 'guest.guest_name_display', 'guest.guest_code', 'guest.id');
        if (isset($data['search'])) {
            $report_guest = $report_guest->where(function ($query) use ($data) {
                $query->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest_code', 'like', '%' . $data['search'] . '%');
            });
        }
        // Mã khách hàng
        if (isset($data['code'])) {
            $report_guest = $report_guest->where('guest_code', 'like', '%' . $data['code'] . '%');
        }
        // Công ty
        if (isset($data['name'])) {
            $report_guest = $report_guest->whereIn('guest.id', $data['name']);
        }
        // Tổng doanh số
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $report_guest = $report_guest->having('sumSell', $data['total'][0], $data['total'][1]);
        }
        // Công nợ
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $report_guest = $report_guest->having('sumAmountOwed', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $report_guest = $report_guest->orderBy($data['sort'][0], $data['sort'][1]);
        }


        $report_guest = $report_guest->get();
        return $report_guest;
    }
    public function getUserInPayEx()
    {
        $pay_export = PayExport::leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
            ->leftJoin('users', 'pay_export.user_id', 'users.id')->distinct('guest.id')
            ->select('*', 'users.*')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $pay_export;
    }
    public function code_paymentById($data)
    {
        $pay_export = DB::table($this->table);
        if (isset($data)) {
            $pay_export = $pay_export->whereIn('id', $data);
        }
        $pay_export = $pay_export->pluck('code_payment')->all();
        return $pay_export;
    }
    public function ajaxdas($data)
    {
        $payExport = PayExport::leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'pay_export.guest_id', 'guest.id')
            ->leftJoin('history_payment_export', 'pay_export.id', 'history_payment_export.pay_id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select(
                'detailexport.quotation_number',
                'guest.guest_name_display',
                'pay_export.payment_date',
                'pay_export.total',
                'pay_export.id as id',
                'pay_export.debt',
                'pay_export.status',
                'pay_export.payment',
                'pay_export.code_payment',
                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo'),
                DB::raw('SUM(history_payment_export.payment) as tongThanhToan')
            );
        if (isset($data['search'])) {
            $payExport = $payExport->where(function ($query) use ($data) {
                $query->orWhere('detailexport.quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('pay_export.code_payment', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['quotenumber'])) {
            $payExport = $payExport->where('quotation_number', 'like', '%' . $data['quotenumber'] . '%');
        }
        if (isset($data['guests'])) {
            $payExport = $payExport->where('detailexport.guest_name', 'like', '%' . $data['guests'] . '%');
        }
        if (isset($data['code_payment'])) {
            $payExport = $payExport->whereIn('pay_export.id', $data['code_payment']);
        }
        if (isset($data['users'])) {
            $payExport = $payExport->whereIn('pay_export.user_id', $data['users']);
        }
        if (isset($data['status']) && is_array($data['status'])) {
            if (in_array(7, $data['status'])) {
                $payExport = $payExport->where(function ($query) {
                    $query->where('pay_export.status', 1)
                        ->where('pay_export.payment', '>', 0);
                });
                $payExport = $payExport->orWhere(function ($query) use ($data) {
                    $dataWithout7 = array_diff($data['status'], [7]);
                    $query->orWhereIn('pay_export.status', $dataWithout7);
                });
            } else {
                if (in_array(1, $data['status'])) {
                    $payExport = $payExport->where(function ($query) {
                        $query->where('pay_export.status', 1)
                            ->where('pay_export.payment', '<=', 0);
                    });
                    $payExport = $payExport->orWhere(function ($query) use ($data) {
                        $dataWithout7 = array_diff($data['status'], [1]);
                        $query->orWhereIn('pay_export.status', $dataWithout7);
                    });
                } else {
                    $payExport = $payExport->whereIn('pay_export.status', $data['status']);
                }
            }
        }
        if (isset($data['payment'][0]) && isset($data['payment'][1])) {
            $payExport = $payExport->where('pay_export.payment', $data['payment'][0], $data['payment'][1]);
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $payExport = $payExport->where('pay_export.debt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $payExport = $payExport->where('pay_export.total', $data['total'][0], $data['total'][1]);
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $payExport = $payExport->whereBetween('pay_export.payment_date', [$dateStart, $dateEnd]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $payExport = $payExport->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $payExport = $payExport->groupby(
            'detailexport.quotation_number',
            'guest.guest_name_display',
            'pay_export.payment_date',
            'pay_export.total',
            'pay_export.id',
            'detailexport.total_price',
            'detailexport.total_tax',
            'pay_export.debt',
            'pay_export.status',
            'pay_export.payment',
            'pay_export.code_payment',
        );

        $payExport = $payExport->get();
        return $payExport;
    }
}
