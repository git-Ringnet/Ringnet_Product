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

    public function getAllGuest()
    {
        return DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
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
    public function ajax($data)
    {
        $guests =  DB::table($this->table);
        if (isset($data['search'])) {
            $guests = $guests->where(function ($query) use ($data) {
                $query->orWhere('guest_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['idName'])) {
            $guests = $guests->whereIn('guest.id', $data['idName']);
        }
        if (isset($data['idCompany'])) {
            $guests = $guests->whereIn('guest.id', $data['idCompany']);
        }
        if (isset($data['email'])) {
            $guests = $guests->where('guest_email', 'like', '%' . $data['email'] . '%');
        }
        if (isset($data['phone'])) {
            $guests = $guests->where('guest_phone', 'like', '%' . $data['phone'] . '%');
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $guests = $guests->where('guest_debt', $data['debt'][0], $data['debt'][1]);
        }
        if (isset($data['sort_by']) && $data['sort_type']) {
            $guests = $guests->orderBy($data['sort_by'], $data['sort_type']);
        }
        $guests = $guests->get();
        return $guests;
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
            $dataguest = [
                'guest_name_display' => $data['guest_name_display'],
                'guest_name' => $data['guest_name'],
                'guest_address' => $data['guest_address'],
                'guest_code' => $data['guest_code'],
                'guest_phone' => isset($data['guest_phone']) ? $data['guest_phone'] : null,
                'guest_email' => isset($data['guest_email']) ? $data['guest_email'] : null,
                'key' => $data['key'],
                'guest_receiver' => isset($data['guest_receiver']) ? $data['guest_receiver'] : null,
                'guest_email_personal' => isset($data['guest_email_personal']) ? $data['guest_email_personal'] : null,
                'guest_phone_receiver' => isset($data['guest_phone_receiver']) ? $data['guest_phone_receiver'] : null,
                'guest_debt' => isset($data['guest_debt']) ? $data['guest_debt'] : 0,
                'guest_note' => isset($data['guest_note']) ? $data['guest_note'] : null,
                'workspace_id' => Auth::user()->current_workspace,
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
                $guest->guest_name_display = $data['guest_name_display'];
                $guest->key = $data['key'];
                $guest->guest_name = $data['guest_name'];
                $guest->guest_address = $data['guest_address'];
                $guest->guest_code = $data['guest_code'];
                $guest->save();
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
}
