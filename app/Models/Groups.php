<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Groups extends Model
{
    use HasFactory;
    protected $table = 'groups';

    protected $fillable = [
        'grouptype_id',
        'name',
        'description',
    ];
    public function getAll()
    {
        return Groups::with('grouptype')->get();
    }

    public function groupType()
    {
        return $this->belongsTo(Grouptype::class, 'grouptype_id', 'id');
    }
    public function addGroup($data)
    {
        $exist = false;
        // $guests = DB::table($this->table)
        //     ->where('workspace_id', Auth::user()->current_workspace)
        //     ->where(function ($query) use ($data) {
        //         $query->where('guest_code', $data['guest_code'])
        //             ->orWhere('guest_name_display', $data['guest_name_display']);
        //     })
        //     ->first();
        // if ($guests) {
        //     $exist = true;
        // } else {
        //     $nameKey = null;
        //     if ($data['key'] == null) {
        //         $nameKey = "RN";
        //     }
        //     $checkKey = Guest::where('workspace_id', Auth::user()->current_workspace)
        //         ->where('key', $data['key'])
        //         ->first();

        //     if ($checkKey) {
        //         // Tên viết tắt đã tồn tại, thực hiện logic thay đổi giá trị key
        //         $newKey = $data['key'] . ($checkKey->id + 1);

        //         // Kiểm tra xem key mới đã tồn tại chưa
        //         $counter = 1;
        //         while (Guest::where('workspace_id', Auth::user()->current_workspace)
        //             ->where('key', $newKey)
        //             ->exists()
        //         ) {
        //             // Nếu key đã tồn tại, thay đổi giá trị key và tăng counter
        //             $newKey = $data['key'] . ($checkKey->id + $counter);
        //             $counter++;
        //         }
        //         $nameKey = $newKey;
        //     }
        //     $dataguest = [
        //         'guest_name_display' => $data['guest_name_display'],
        //         'guest_name' => $data['guest_name'],
        //         'guest_address' => $data['guest_address'],
        //         'guest_code' => $data['guest_code'],
        //         'guest_phone' => isset($data['guest_phone']) ? $data['guest_phone'] : null,
        //         'guest_email' => isset($data['guest_email']) ? $data['guest_email'] : null,
        //         'key' => $nameKey == null ? $data['key'] : $nameKey,
        //         'user_id' => Auth::user()->id,
        //         'guest_receiver' => isset($data['guest_receiver']) ? $data['guest_receiver'] : null,
        //         'guest_email_personal' => isset($data['guest_email_personal']) ? $data['guest_email_personal'] : null,
        //         'guest_phone_receiver' => isset($data['guest_phone_receiver']) ? $data['guest_phone_receiver'] : null,
        //         'guest_debt' => isset($data['guest_debt']) ? $data['guest_debt'] : 0,
        //         'guest_note' => isset($data['guest_note']) ? $data['guest_note'] : null,
        //         'workspace_id' => Auth::user()->current_workspace,
        //     ];
        //     $guest_id =  DB::table($this->table)->insertGetId($dataguest);
        //     //Thêm người đại diện
        //     if (isset($data['represent_name'])) {
        //         for ($i = 0; $i < count($data['represent_name']); $i++) {
        //             $dataRepresent = [
        //                 'guest_id' => $guest_id,
        //                 'represent_name' => $data['represent_name'][$i],
        //                 'represent_email' => $data['represent_email'][$i],
        //                 'represent_phone' => $data['represent_phone'][$i],
        //                 'represent_address' => $data['represent_address'][$i],
        //                 'user_id' => Auth::user()->id,
        //                 'workspace_id' => Auth::user()->current_workspace,
        //                 'created_at' => Carbon::now(),
        //                 'updated_at' => Carbon::now(),
        //             ];
        //             DB::table('represent_guest')->insert($dataRepresent);
        //         }
        //     }
        // }
        $datagroup = [
            'name' => $data['group_name_display'],
            'grouptype_id' => $data['grouptype_id'],
            'description' => $data['group_desc'],
            'workspace_id' => Auth::user()->current_workspace,
        ];
        DB::table($this->table)->insertGetId($datagroup);
        return $exist;
    }
}
