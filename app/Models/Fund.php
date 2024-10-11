<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Fund extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'amount',
        'bank_name',
        'bank_account_number',
        'bank_account_holder',
        'start_date',
        'end_date',
        'workspace_id'
    ];
    protected $table = 'funds';

    public function getPayOrder()
    {
        return $this->hasMany(PayOder::class, 'fund_id', 'id');
    }
    public function getPayExport()
    {
        return $this->hasMany(CashReceipt::class, 'fund_id', 'id');
    }

    public function calculateFunds($id, $money, $operation)
    {
        // Lấy thông tin quỹ
        $fund = Fund::where('id', $id)->first();
        if ($fund) {
            // Loại bỏ dấu phẩy từ giá trị tiền và chuyển đổi thành số
            $money = str_replace(',', '', $money);
            $money = floatval($money);

            // Chuyển đổi giá trị quỹ thành số hoặc mặc định là 0 nếu không tồn tại
            $fundAmount = floatval($fund->amount ?? 0);

            // Thực hiện phép toán dựa trên loại phép toán
            if ($operation === '+') {
                $total = $fundAmount + $money;
            } elseif ($operation === '-') {
                $total = $fundAmount - $money;
            } else {
                throw new \InvalidArgumentException("Invalid operation. Use '+' or '-'.");
            }

            // Cập nhật số tiền trong quỹ
            $fund->amount = $total;
            $fund->save();
        } else {
            throw new \Exception("Fund not found.");
        }
    }
    public function ajax($data)
    {
        $dateStart = null;
        $dateEnd = null;
        // Kiểm tra xem có dữ liệu ngày không
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
        }
        // Lấy danh sách các bản ghi từ getPayOrder với điều kiện ngày tháng
        $payOrderResults = Fund::where('workspace_id', Auth::user()->current_workspace)
            ->whereHas('getPayOrder', function ($query) use ($dateStart, $dateEnd) {
                if ($dateStart && $dateEnd) {
                    $query->whereBetween('created_at', [$dateStart, $dateEnd]);
                }
            })
            ->get();
        // Lấy danh sách các bản ghi từ getPayExport với điều kiện ngày tháng
        $payExportResults = Fund::where('workspace_id', Auth::user()->current_workspace)
            ->whereHas('getPayExport', function ($query) use ($dateStart, $dateEnd) {
                if ($dateStart && $dateEnd) {
                    $query->whereBetween('created_at', [$dateStart, $dateEnd]);
                }
            })
            ->get();
        // Kết hợp cả hai mảng kết quả nếu cần
        $combinedResults = $payOrderResults->merge($payExportResults);
        return [
            'payOrderResults' => $payOrderResults,
            'payExportResults' => $payExportResults,
            'combinedResults' => $combinedResults,
        ];
    }
    public function searchFilter($data)
    {
        $funds =  DB::table($this->table)->where('workspace_id', Auth::user()->current_workspace);
        if (isset($data['search'])) {
            $funds = $funds->where(function ($query) use ($data) {
                $query->orWhere('name', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['fundName']) && !empty($data['fundName'])) {
            $funds = $funds->where('name', 'like', '%' . $data['fundName'] . '%');
        }
        if (isset($data['fundAmount'][0]) && isset($data['fundAmount'][1])) {
            $funds = $funds->where('amount', $data['fundAmount'][0], $data['fundAmount'][1]);
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();

            $funds = $funds->whereBetween('start_date', [$dateStart, $dateEnd]);
        }

        if (isset($data['sort']) && isset($data['sort'][0])) {
            $funds = $funds->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $funds = $funds->get();
        return $funds;
    }

    public function searchDetailFilter($data)
    {
        // Lấy các khoản thu (cash_receipts)
        $fundReceipts = DB::table('cash_receipts')
            ->join('funds', 'cash_receipts.fund_id', '=', 'funds.id')
            ->select(
                'cash_receipts.fund_id',
                'funds.name as fund_name',
                'cash_receipts.created_at',
                'cash_receipts.amount',
                'cash_receipts.date_created',
                'cash_receipts.receipt_code',
                'cash_receipts.id as id'
            )
            ->where('cash_receipts.fund_id', $data['data'])
            ->get()
            ->map(function ($item) {
                $item->source_id = 'cash_receipts';
                return $item;
            });
        // Lấy các khoản chi (pay_order)
        $fundPayments = DB::table('pay_order')
            ->join('funds', 'pay_order.fund_id', '=', 'funds.id')
            ->select(
                'pay_order.fund_id',
                'funds.name as fund_name',
                'pay_order.created_at',
                'pay_order.payment',
                'pay_order.payment_code',
                'pay_order.total',
                'pay_order.payment_date',
                'pay_order.id as id'
            )
            ->where('pay_order.fund_id', $data['data'])
            ->get()
            ->map(function ($item) {
                $item->source_id = 'pay_order';
                $item->date_created = $item->payment_date;
                return $item;
            });
        // Kết hợp dữ liệu thu và chi
        $combined = $fundReceipts->concat($fundPayments);
        // Lọc theo từ khóa tìm kiếm
        if (isset($data['search'])) {
            $combined = $combined->filter(function ($item) use ($data) {
                return stripos($item->payment_code ?? '', $data['search']) !== false
                    || stripos($item->receipt_code ?? '', $data['search']) !== false;
            });
        }
        // Lọc theo chứng từ
        if (!empty($data['chungtu'])) {
            $combined = $combined->filter(function ($item) use ($data) {
                return stripos($item->payment_code ?? '', $data['chungtu']) !== false
                    || stripos($item->receipt_code ?? '', $data['chungtu']) !== false;
            });
        }
        // Lọc theo khoản thu
        if (isset($data['thu'][0]) && isset($data['thu'][1])) {
            $operation = $data['thu'][0]; // Phép so sánh (ví dụ: '>', '<', '>=', '<=', '=')
            $value = $data['thu'][1]; // Giá trị cần so sánh
            $fundReceipts = $fundReceipts->filter(function ($item) use ($operation, $value) {
                return version_compare($item->amount, $value, $operation);
            });
            // Cập nhật kết quả chỉ từ fundReceipts nếu có điều kiện lọc thu
            $combined = $fundReceipts;
        }
        // Lọc theo khoản chi
        if (isset($data['chi'][0]) && isset($data['chi'][1])) {
            $operation = $data['chi'][0]; // Phép so sánh (ví dụ: '>', '<', '>=', '<=', '=')
            $value = $data['chi'][1]; // Giá trị cần so sánh
            $fundPayments = $fundPayments->filter(function ($item) use ($operation, $value) {
                return version_compare($item->total, $value, $operation);
            });
            // Cập nhật kết quả chỉ từ fundPayments nếu có điều kiện lọc chi
            $combined = $fundPayments;
        }
        // Lọc theo ngày
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            // Sử dụng filter để lọc theo khoảng ngày
            $combined = $combined->filter(function ($item) use ($dateStart, $dateEnd) {
                $itemDate = Carbon::parse($item->date_created);
                return $itemDate->between($dateStart, $dateEnd);
            });
        }
        // Sắp xếp kết quả theo ngày
        $combined = $combined->sortBy('date_created')->values()->toArray();
        return $combined;
    }
}
