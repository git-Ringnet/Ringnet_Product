<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'guest_name_display',
        'guest_name',
        'guest_address',
        'guest_code',
        'guest_email',
        'guest_phone',
        'guest_receiver',
        'guest_email_personal',
        'guest_phone_receiver',
        'guest_debt',
        'guest_note',
        'workspace_id',
    ];
    protected $table = 'guest';

    public function getAllDetailByID()
    {
        return $this->hasMany(DetailExport::class, 'guest_id', 'id')
            ->whereIn('detailexport.status', [2, 3]);
    }
    public function getPayment()
    {
        return $this->hasOne(PayExport::class, 'guest_id', 'id');
    }
    public function representGuest()
    {
        return $this->belongsTo(representGuest::class, 'guest_id', 'id');
    }

    public function getAllGuest()
    {
        $guests = DB::table($this->table)
            ->leftJoin('users', 'guest.user_id', '=', 'users.id')
            ->leftJoin('represent_guest', 'represent_guest.guest_id', '=', 'guest.id')
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->orderBy('guest.id', 'DESC')
            ->select(
                'represent_guest.*',
                'guest.*',
                'users.name as name',
                DB::raw('COALESCE((SELECT SUM(amount_owed) FROM detailexport WHERE guest_id = guest.id AND status = 2), 0) as sumDebt')
            )
            ->get();
        // dd($guests);
        return $guests;
    }
    public function getGuestbyCompany($data)
    {
        $guests = DB::table($this->table);
        if (isset($data['idCompany'])) {
            $guests = $guests->whereIn('guest.id', $data['idCompany']);
        }
        $guests = $guests->pluck('guest_name')->all();
        return $guests;
    }
    public function getGuestbyName($data)
    {
        $guests = DB::table($this->table);
        if (isset($data['idName'])) {
            $guests = $guests->whereIn('guest.id', $data['idName']);
        }
        if (isset($data['filters']['idGuests'])) {
            $guests = $guests->whereIn('guest.id', $data['filters']['idGuests']);
        }
        $guests = $guests->pluck('guest_name_display')->all();
        return $guests;
    }
    public function getGuestbyId($id)
    {
        $guests = DB::table($this->table);
        $guests = $guests->where('guest.id', $id)->get();

        return $guests;
    }
    public function getGuestRepresentbyId($id)
    {
        $guests = Guest::select('guest.*', 'represent_guest.*', 'guest.id as idGuest', 'represent_guest.id as representID')
            ->where('guest.id', $id)
            ->leftJoin('represent_guest', function ($join) {
                $join->on('represent_guest.guest_id', '=', 'guest.id');
            })
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->first();

        return $guests;
    }
    public function getUserInGuests()
    {
        $guests = DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->leftJoin('users', 'guest.user_id', '=', 'users.id')
            ->orderBy('guest.id', 'DESC')
            ->select('guest.*', 'users.name as name', 'users.*')->get();
        return $guests;
    }
    public function guestNameById($data)
    {
        $guests = DB::table($this->table);
        if (isset($data)) {
            $guests = $guests->whereIn('id', $data);
        }
        $guests = $guests->pluck('guest_name')->all();
        return $guests;
    }
    public function ajax($data)
    {
        $guests = DB::table($this->table)
            ->leftJoin('users', 'guest.user_id', '=', 'users.id')
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->select(
                'guest.*',
                'users.name as name',
                DB::raw('COALESCE((SELECT SUM(amount_owed) FROM detailexport WHERE guest_id = guest.id AND status = 2), 0) as sumDebt')
            );
        if (isset($data['search'])) {
            $guests = $guests->where(function ($query) use ($data) {
                $query->orWhere('guest_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest_code', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['guest_code'])) {
            $guests = $guests->where('guest_code', 'like', '%' . $data['guest_code'] . '%');
        }
        if (isset($data['guests'])) {
            $guests = $guests->whereIn('guest.id', $data['guests']);
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $guests = $guests->having('sumDebt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $guests = $guests->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $guests = $guests->get();
        return $guests;
    }

    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }

    public function addGuest($data)
    {
        $exist = false;
        $guests = DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($data) {
                $query->where('guest_code', $data['guest_code'])
                    ->orWhere('guest_name_display', $data['guest_name_display']);
            })
            ->first();
        if ($guests) {
            $exist = true;
        } else {
            $nameKey = null;
            if ($data['key'] == null) {
                $nameKey = "RN";
            }
            $checkKey = Guest::where('workspace_id', Auth::user()->current_workspace)
                ->where('key', $data['key'])
                ->first();

            if ($checkKey) {
                // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                $newKey = $data['key'] . ($checkKey->id + 1);

                // Kiểm tra xem key mới đã tồn tại chưa
                $counter = 1;
                while (Guest::where('workspace_id', Auth::user()->current_workspace)
                    ->where('key', $newKey)
                    ->exists()
                ) {
                    // Nếu key đã tồn tại, thay đổi giá trị key và tăng counter
                    $newKey = $data['key'] . ($checkKey->id + $counter);
                    $counter++;
                }
                $nameKey = $newKey;
            }
            $dataguest = [
                'guest_name_display' => $data['guest_name_display'],
                'guest_name' => $data['guest_name'],
                'guest_address' => $data['guest_address'],
                'guest_code' => $data['guest_code'],
                'guest_phone' => isset($data['guest_phone']) ? $data['guest_phone'] : null,
                'guest_email' => isset($data['guest_email']) ? $data['guest_email'] : null,
                'key' => $nameKey == null ? $data['key'] : $nameKey,
                'user_id' => Auth::user()->id,
                'guest_receiver' => isset($data['guest_receiver']) ? $data['guest_receiver'] : null,
                'guest_email_personal' => isset($data['guest_email_personal']) ? $data['guest_email_personal'] : null,
                'guest_phone_receiver' => isset($data['guest_phone_receiver']) ? $data['guest_phone_receiver'] : null,
                'guest_debt' => isset($data['guest_debt']) ? $data['guest_debt'] : 0,
                'guest_note' => isset($data['guest_note']) ? $data['guest_note'] : null,
                'workspace_id' => Auth::user()->current_workspace,
                'group_id' => isset($data['grouptype_id']) ? $data['grouptype_id'] : 0,
            ];
            $guest_id =  DB::table($this->table)->insertGetId($dataguest);
            //Thêm người đại diện
            if (isset($data['represent_name'])) {
                for ($i = 0; $i < count($data['represent_name']); $i++) {
                    $dataRepresent = [
                        'guest_id' => $guest_id,
                        'represent_name' => $data['represent_name'][$i],
                        'represent_email' => $data['represent_email'][$i],
                        'represent_phone' => $data['represent_phone'][$i],
                        'represent_address' => $data['represent_address'][$i],
                        'user_id' => Auth::user()->id,
                        'workspace_id' => Auth::user()->current_workspace,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                    DB::table('represent_guest')->insert($dataRepresent);
                }
            }
        }
        return $exist;
    }

    public function updateGuestRepresent($data)
    {
        $checkGuest = DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($data) {
                $query->where('guest_code', $data['guest_code'])
                    ->orWhere('guest_name_display', $data['guest_name_display']);
            })
            ->where('id', '!=', $data['guest_id'])
            ->first();
        if ($checkGuest) {
            return response()->json(['success' => false, 'msg' => 'Thông tin khách hàng đã tồn tại']);
        } else {
            $guest = Guest::where('id', $data['guest_id'])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($guest) {
                $checkKey = Guest::where('workspace_id', Auth::user()->current_workspace)
                    ->where('id', '!=', $data['guest_id'])
                    ->where('key', $data['key'])
                    ->first();

                if ($checkKey) {
                    // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
                    $newKey = $data['key'];

                    // Tăng số đằng sau cho đến khi không còn trùng
                    while (Guest::where('workspace_id', Auth::user()->current_workspace)
                        ->where('key', $newKey)
                        ->exists()
                    ) {
                        // Kiểm tra xem key có kết thúc bằng số không
                        if (preg_match('/\d+$/', $newKey)) {
                            // Tăng số đằng sau
                            $newKey = preg_replace_callback('/(\d+)$/', function ($matches) {
                                return ++$matches[1];
                            }, $newKey);
                        } else {
                            // Nếu không có số, thêm số 1 vào sau key
                            $newKey .= '1';
                        }
                    }

                    return response()->json([
                        'success' => false,
                        'msg' => 'Tên viết tắt đã tồn tại!',
                        'key' => $newKey,
                    ]);
                } else {
                    $key = isset($data['key']) ? $data['key'] : $this->generateKey($data['guest_name_display']);
                    $guest->guest_name_display = $data['guest_name_display'];
                    $guest->key = $key;
                    $guest->guest_name = $data['guest_name'];
                    $guest->guest_address = $data['guest_address'];
                    $guest->guest_code = $data['guest_code'];
                    $guest->guest_email = $data['guest_email'];
                    $guest->guest_phone = $data['guest_phone'];
                    $guest->guest_receiver = $data['guest_receiver'];
                    $guest->save();
                }
            }
            $checkRepresent = representGuest::where(function ($query) use ($data) {
                $query->where('represent_name', $data['represent_guest_name']);
            })
                ->where('id', '!=', $data['represent_id'])
                ->where('guest_id', $data['guest_id'])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($checkRepresent) {
                return response()->json(['success' => false, 'msg' => 'Thông tin người đại diện đã tồn tại']);
            } else {
                $represent = null;

                $representGuestName = $data['represent_guest_name'];

                if (!empty($representGuestName)) {
                    $represent = representGuest::where('id', $data['represent_id'])
                        ->where('guest_id', $data['guest_id'])
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->firstOrNew();

                    if (!$represent->exists) {
                        // Nếu không tìm thấy, đây là lần đầu tiên sử dụng firstOrNew
                        $represent->id = $data['represent_id'];
                        $represent->guest_id = $data['guest_id'];
                        $represent->workspace_id = Auth::user()->current_workspace;
                    }

                    $represent->represent_name = $representGuestName;
                    $represent->save();
                }
            }
        }
        return response()->json([
            'success' => true,
            'msg' => 'Cập nhật thông tin khách hàng thành công!',
            'updated_guest' => $guest,
            'updated_represent' => $represent,
        ]);
    }

    private function generateKey($name)
    {
        $key = preg_match_all('/[A-ZĐ]/u', $name, $matches);
        if ($key > 0) {
            $key = implode('', $matches[0]);
        } else {
            $key = ucfirst($name);
            $key = preg_match_all('/[A-ZĐ]/u', $key, $matches);
            $key = implode('', $matches[0]);
            $key = $key ?: "RN";
        }

        return $key;
    }

    public function updateProvide($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function dateForms()
    {
        return $this->belongsToMany(DateForm::class, 'guest_dateform', 'guest_id', 'date_form_id');
    }
    public function model(array $row)
    {
        return new Guest([
            'guest_name_display' => $row['A'], // Thay $row[0] bằng cột tương ứng trong file Excel
            'guest_code' => $row['B'],
        ]);
    }
    public function deleteGuest($id)
    {
        $guest = Guest::find($id);
        $check = DetailExport::where('guest_id', $id)->first();
        if (!$check) {
            if ($guest) {
                $guest->delete();
                representGuest::where('guest_id', $id)->delete();
                return response()->json(['success' => true, 'message' => 'Xóa thành công khách hàng']);
            } else {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy khách hàng'], 404);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Xóa thất bại do khách hàng này đang báo giá!']);
        }
    }
    public function guestName($data)
    {
        $guests = DB::table($this->table);
        if (isset($data)) {
            $guests = $guests->whereIn('guest.id', $data);
        }
        $guests = $guests->pluck('guest_name_display')->all();
        return $guests;
    }
    public function debtGuest()
    {
        $guests = Guest::leftJoin('delivery', 'guest.id', '=', 'delivery.guest_id')
            ->leftJoin('detailexport', 'detailexport.guest_id', '=', 'guest.id')
            ->leftJoin('return_export', 'delivery.id', '=', 'return_export.delivery_id')
            ->leftJoin('cash_receipts', 'delivery.id', '=', 'cash_receipts.delivery_id')
            ->leftJoin('pay_order', 'return_export.id', '=', 'pay_order.return_id')
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->select(
                'guest.key as maKhach',
                'guest.guest_name_display as tenKhach',
                DB::raw('SUM(detailexport.total_price + detailexport.total_tax) as totalProductVat'), // Tổng tiền đã bán
                DB::raw('(SELECT SUM(totalVat) FROM delivery WHERE guest_id = guest.id AND status = 2) as totalDelivery'), // Tổng tiền đơn hàng đã tính đã trả
                DB::raw('(SELECT SUM(amount) FROM cash_receipts WHERE guest_id = guest.id AND status = 2) as totalCashReciept'), // Tổng tiền đã trả đơn hàng
                DB::raw('(SELECT SUM(total_return) FROM return_export WHERE guest_id = guest.id AND status = 2) as totalReturn'), // Tổng tiền phải trả cho khách khi trả hàng
                DB::raw('(SELECT SUM(payment) FROM return_export WHERE guest_id = guest.id AND status = 2) as daTraKH'), // Tổng tiền đã trả cho khách khi trả hàng
                DB::raw('(SELECT SUM(payment) FROM pay_order WHERE guest_id = guest.id) as chiKH'), // Tiền chi
            )
            ->groupBy('guest.id', 'guest.key', 'guest.guest_name', 'guest.guest_name_display')
            ->get();

        return $guests;
    }
}
