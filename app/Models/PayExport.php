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
        'code_payment',
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

        // Ensure numeric values
        $total = isset($data['total']) ? str_replace(',', '', $data['total']) : $detailExport->amount_owed;
        $payment = isset($data['payment']) ? str_replace(',', '', $data['payment']) : 0;
        $date_pay = isset($data['date_pay']) ? Carbon::parse($data['date_pay']) : Carbon::now();

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

        $dataPay = [
            'detailexport_id' => $data['detailexport_id'],
            'guest_id' => $data['guest_id'],
            'code_payment' => $data['code_payment'],
            'payment_date' => $date_pay,
            'total' => $total,
            'payment' => $payment,
            'debt' => $result,
            'status' => $status,
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => Carbon::now(),
        ];

        // Use create method instead of new + save
        $payExport = PayExport::create($dataPay);

        // Update detailExport in a single query
        $detailExport->update([
            'status' => $result == 0 ? 3 : 2,
            'amount_owed' => max(0, $result),
            'status_pay' => $payment > 0 ? ($payment < $result ? 3 : 1) : 1,
        ]);

        // Check if additional conditions are met to update status in detailExport
        if ($result == 0 && $detailExport->status_receive == 2 && $detailExport->status_reciept == 2 && $detailExport->status_pay == 2) {
            $detailExport->update(['status' => 3]);
        }

        // Create history only if payment is set
        if (isset($data['payment'])) {
            $historyData = [
                'pay_id' => $payExport->id,
                'total' => $total,
                'payment' => $payment,
                'debt' => $result,
                'workspace_id' => Auth::user()->current_workspace,
            ];

            // Use create method instead of new + save
            history_Pay_Export::create($historyData);

            // Update payment in payExport
            $payExport->update(['payment' => $payment]);
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

        //
        $date_pay = isset($data['date_pay']) ? Carbon::parse($data['date_pay']) : Carbon::now();
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
    public function guestStatistics()
    {
        $report_guest = DetailExport::where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'guest.id', '=', 'detailexport.guest_id')
            ->where('detailexport.status', 2)
            ->select(
                'detailexport.guest_id as guest_id',
                'guest.guest_name_display as guest_name',
                'guest.guest_code as guest_code',
                'guest.id',
                DB::raw('SUM(detailexport.total_price + detailexport.total_tax) as sumSell'),
                DB::raw('SUM(detailexport.amount_owed) as sumAmountOwed')
            )
            ->groupBy('detailexport.guest_id', 'guest.guest_name_display', 'guest.guest_code', 'guest.id')
            ->get();
        return $report_guest;
    }
    public function ajax($data)
    {
        $report_guest = DetailExport::where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'guest.id', '=', 'detailexport.guest_id')
            ->where('detailexport.status', 2)
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
    public function ajaxdas($data)
    {
        $payExport = PayExport::leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'pay_export.guest_id', 'guest.id')
            ->leftJoin('history_payment_export', 'pay_export.id', 'history_payment_export.pay_id')
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->select(
                'detailexport.quotation_number',
                'guest.guest_name_display',
                'pay_export.payment_date',
                'pay_export.total',
                'pay_export.id as idThanhToan',
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
