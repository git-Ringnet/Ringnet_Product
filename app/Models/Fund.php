<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
}
