<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Provides extends Model
{
    use HasFactory;
    protected $table = 'provides';
    protected $fillable = [
        'id',
        'provide_name_display',
        'provide_name',
        'provide_address',
        'provide_code',
        'provide_represent',
        'provide_email',
        'provide_phone',
        'provide_debt',
        'provide_address_delivery',
        'workspace_id',
        'group_id'
    ];
    public function getGroup()
    {
        return $this->hasOne(Groups::class, 'id', 'group_id');
    }


    public function getAllDetail()
    {
        return $this->hasMany(DetailImport::class, 'provide_id', 'id');
    }
    public function getAllDetailByID()
    {
        return $this->hasMany(DetailImport::class, 'provide_id', 'id')
            ->whereIn('detailimport.status', [2, 0]);
    }

    public function getPayment()
    {
        return $this->hasOne(PayOder::class, 'provide_id', 'id');
    }

    public function getNameUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getAllProvide()
    {
        // return DB::table($this->table)->where('workspace_id', Auth::user()->current_workspace)->get();
        return Provides::where('workspace_id', Auth::user()->current_workspace)->get();
    }
    public function addProvide($data)
    {
        $result = [];
        $provides = DB::table($this->table)->where('key', $data['key'])
            ->orWhere('provide_name_display', $data['provide_name_display'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($provides) {
            $result = [
                'status' => true,
            ];
        } else {
            if (isset($data['key'])) {
                $key = $data['key'];
            } else {
                $key = preg_match_all('/[A-ZĐ]/u', $data['provide_name_display'], $matches);
                if ($key > 0) {
                    $key = implode('', $matches[0]);
                } else {
                    $key =  ucfirst($data['provide_name_display']);
                    $key = preg_match_all('/[A-ZĐ]/u', $key, $matches);
                    $key = implode('', $matches[0]);
                    if ($key) {
                        $key = $key;
                    } else {
                        $key = "RN";
                    }
                }
            }
            $dataProvide = [
                'provide_name_display' => $data['provide_name_display'],
                'provide_name' => isset($data['provide_name']) ? $data['provide_name'] : "",
                'provide_address' => $data['provide_address'],
                'provide_code' => isset($data['provide_code']) ? $data['provide_code'] : null,
                'key' => $data['key'],
                'provide_debt' => 0,
                'provide_email' => $data['provide_email'],
                'provide_phone' => $data['provide_phone'],
                'quota_debt' => isset($data['quota_debt']) ? str_replace(',', '', $data['quota_debt']) : 0,
                'group_id' => isset($data['category_id']) ? $data['category_id'] : 0,
                'workspace_id' => Auth::user()->current_workspace,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ];
            $provide_id =  DB::table($this->table)->insertGetId($dataProvide);
            if ($provide_id) {
                $result = [
                    'status' => false,
                    'id' => $provide_id
                ];
            }
        }
        return $result;
    }
    public function updateProvide($data, $id)
    {
        $exist = false;

        $check = DB::table($this->table)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($data) {
                $query->where('key', $data['key'])
                    ->orWhere('provide_name_display', $data['provide_name_display']);
            })
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();

        if ($check) {
            $exist = true;
        } else {
            $dataUpdate = [
                'provide_name_display' => $data['provide_name_display'],
                'key' => $data['key'],
                'provide_name' => isset($data['provide_name']) ? $data['provide_name'] : "",
                'provide_address' => $data['provide_address'],
                'provide_code' => isset($data['provide_code']) ? $data['provide_code'] : null,
                'provide_phone' => $data['provide_phone'],
                'provide_email' => $data['provide_email'],
                'provide_fax' => isset($data['provide_fax']) ? $data['provide_fax'] : null,
                'quota_debt' => isset($data['quota_debt']) ? str_replace(',', '', $data['quota_debt']) : null,
                'group_id' => $data['category_id']
            ];
            Provides::where('id', $id)->update($dataUpdate);
            if (isset($data['represent_name'])) {
                // Xóa các id không tòn tại
                if (isset($data['repesent_id'])) {
                    ProvideRepesent::where('provide_id', $id)->whereNotIn('id', $data['repesent_id'])->delete();
                }
                // Chỉnh sửa thông tin người đại diện và thêm người đại diện
                for ($i = 0; $i < count($data['represent_name']); $i++) {
                    $represent = ProvideRepesent::where('id', isset($data['repesent_id'][$i]) ? $data['repesent_id'][$i]  : "")
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
                    $dataRepresent = [
                        'represent_name' => $data['represent_name'][$i],
                        'represent_email' => $data['represent_email'][$i],
                        'represent_phone' => $data['represent_phone'][$i],
                        'represent_address' => $data['represent_address'][$i],
                        // 'workspace_id' => Auth::user()->current_workspace
                    ];
                    if ($represent) {
                        ProvideRepesent::where('id', $represent->id)->update($dataRepresent);
                    } else {
                        $dataRepresent['provide_id'] = $id;
                        $dataRepresent['workspace_id'] =  Auth::user()->current_workspace;
                        DB::table('represent_provide')->insert($dataRepresent);
                    }
                }
            } else {
                ProvideRepesent::where('provide_id', $id)->delete();
            }
            $exist = false;
        }
        return $exist;
    }
    public function getprovidebyCode($data)
    {
        $provides = DB::table($this->table);
        if (isset($data['idCode'])) {
            $provides = $provides->whereIn('provides.id', $data['idCode']);
        }
        $provides = $provides->pluck('provide_code')->all();
        return $provides;
    }
    public function getprovidebyName($data)
    {
        $provides = DB::table($this->table);
        if (isset($data['idName'])) {
            $provides = $provides->whereIn('provides.id', $data['idName']);
        }
        if (isset($data['filters']['idProvides'])) {
            $provides = $provides->whereIn('provides.id', $data['filters']['idProvides']);
        }
        $provides = $provides->pluck('provide_name_display')->all();
        return $provides;
    }
    public function ajax($data)
    {
        $provides =  DB::table($this->table);
        if (isset($data['search'])) {
            $provides = $provides->where(function ($query) use ($data) {
                $query->orWhere('provide_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provide_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['provide_code'])) {
            $provides = $provides->where('provide_code', 'like', '%' . $data['provide_code'] . '%');
        }
        if (isset($data['provides'])) {
            $provides = $provides->whereIn('provides.id', $data['provides']);
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $provides = $provides->where('provide_debt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $provides = $provides->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $provides = $provides->get();
        return $provides;
    }
    public function model(array $row)
    {
        return new Provides([
            'provide_name_display' => $row['C'], // Thay $row[0] bằng cột tương ứng trong file Excel
            'provide_code' => $row['D'],
        ]);
    }
    public function provideName($data)
    {
        $provides = DB::table($this->table);
        if (isset($data)) {
            $provides = $provides->whereIn('provides.id', $data);
        }
        $provides = $provides->pluck('provide_name_display')->all();
        return $provides;
    }
    public function getUserInProvides()
    {
        $provides = DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->leftJoin('users', 'provides.user_id', '=', 'users.id')
            ->orderBy('provides.id', 'DESC')
            ->select('provides.*', 'users.name as name', 'users.*')->get();
        return $provides;
    }
    public function getProvidebyId($id)
    {
        $provides = DB::table($this->table);
        $provides = $provides->where('provides.id', $id)->get();
        return $provides;
    }
    public function calculateProvideDebt()
    {
        $total = $this->getAllDetailByID
            ->whereIn('status', [2, 0])
            ->sum('total_tax');

        $totalReturn = $this->getAllDetailByID->sum(function ($value) {
            return $value->getAllReceiveBill->sum(function ($value1) {
                return $value1->getReturnImport->sum('total');
            });
        });

        $totalCashReciept = $this->getAllDetailByID->sum(function ($value) {
            return $value->getAllReceiveBill->sum(function ($value1) {
                return $value1->getReturnImport->sum(function ($value2) {
                    return $value2->getAllCashReciept->sum('amount');
                });
            });
        });

        $totalPay = $this->getAllDetailByID->sum(function ($value) {
            return $value->getPayOrders->sum('total');
        });

        return $total - $totalReturn + $totalCashReciept - $totalPay;
    }
    public function ajaxReportDebtProvides($data)
    {
        // Tìm tất cả các khách hàng thuộc workspace hiện tại
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();

        // Mảng chứa kết quả
        $results = [];

        // Kiểm tra xem 'date' có tồn tại và là một mảng hợp lệ không
        if (isset($data['date']) && is_array($data['date']) && !empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
        } else {
            // Nếu không có ngày tháng, sử dụng khoảng thời gian mặc định hoặc xử lý khác
            $dateStart = Carbon::minValue(); // Hoặc một giá trị mặc định
            $dateEnd = Carbon::maxValue();   // Hoặc một giá trị mặc định
        }

        // Lặp qua từng khách hàng
        foreach ($provides as $provide) {
            // Tính tổng cho từng loại dữ liệu
            $totalProductVat = DB::table('detailexport')
                ->where('guest_id', $provide->id)
                ->whereBetween('created_at', [$dateStart, $dateEnd])
                ->sum(DB::raw('total_price + total_tax'));

            $totalDelivery = DB::table('delivery')
                ->where('provide_id', $provide->id)
                ->where('status', 2)
                ->whereBetween('created_at', [$dateStart, $dateEnd])
                ->sum('totalVat');

            $totalCashReciept = DB::table('cash_receipts')
                ->where('provide_id', $provide->id)
                ->where('status', 2)
                ->whereBetween('created_at', [$dateStart, $dateEnd])
                ->sum('amount');

            $totalReturn = DB::table('return_export')
                ->where('provide_id', $provide->id)
                ->where('status', 2)
                ->whereBetween('created_at', [$dateStart, $dateEnd])
                ->sum('total_return');

            $daTraKH = DB::table('return_export')
                ->where('provide_id', $provide->id)
                ->where('status', 2)
                ->whereBetween('created_at', [$dateStart, $dateEnd])
                ->sum('payment');

            $chiKH = DB::table('pay_order')
                ->where('provide_id', $provide->id)
                ->whereBetween('created_at', [$dateStart, $dateEnd])
                ->sum('payment');

            // Tính giá trị theo công thức và lưu vào mảng kết quả
            $calculatedValue = $totalProductVat - $totalCashReciept - ($totalReturn - $chiKH);

            // Lưu kết quả cho khách hàng hiện tại vào mảng
            $results[] = [
                'id' => $provide->id,
                'maKhach' => $provide->key,
                'group_id' => $provide->group_id,
                'tenKhach' => $provide->guest_name_display,
                'totalProductVat' => $totalProductVat,
                'totalDelivery' => $totalDelivery,
                'totalCashReciept' => $totalCashReciept,
                'totalReturn' => $totalReturn,
                'daTraKH' => $daTraKH,
                'chiKH' => $chiKH,
                'calculatedValue' => $calculatedValue,
            ];
        }

        return $results;
    }
}
