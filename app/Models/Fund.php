<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
