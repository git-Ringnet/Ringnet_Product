<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class representGuest extends Model
{
    use HasFactory;
    protected $table = 'represent_guest';
    protected $fillable = [
        'guest_id',
        'represent_name',
        'represent_email',
        'represent_phone',
        'represent_address',
        'default_guest',
        'workspace_id',
        'created_at',
        'updated_at'
    ];

    public function getRepresentGuest($id)
    {
        $representGuest = representGuest::where('guest_id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        return $representGuest;
    }

    public function updateRepresentGuest($data, $id)
    {
        representGuest::where('guest_id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->delete();
        //Thêm người đại diện
        if (isset($data['represent_name'])) {
            for ($i = 0; $i < count($data['represent_name']); $i++) {
                $dataRepresent = [
                    'guest_id' => $id,
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
    public function deleteRepresentGuest($id)
    {
        $representGuest = representGuest::find($id);
        if ($representGuest) {
            $representGuest->delete();
            return response()->json(['success' => true, 'message' => 'Xóa thành công người đại diện']);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy người đại diện'], 404);
        }
        return $representGuest;
    }
    public function editRepresentGuest($id)
    {
        $representGuest = representGuest::find($id);
        return $representGuest;
    }
    public function updateRepresent($id, $data)
    {
        $representGuest = representGuest::find($id);
        if (!$representGuest) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy người đại diện'], 404);
        }
        $representGuest->represent_name = $data['represent_name'];
        $representGuest->represent_email = $data['represent_email'];
        $representGuest->represent_phone = $data['represent_phone'];
        $representGuest->represent_address = $data['represent_address'];
        $representGuest->save();
        return response()->json(['success' => true, 'representGuest' => $representGuest]);
    }
    public function defaultRepresent($id, $id_guest)
    {
        $representGuest = representGuest::find($id);
        representGuest::where('guest_id', $id_guest)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->update(['default_guest' => 0]);
        $representGuest->default_guest = 1;
        $representGuest->save();
        return response()->json(['success' => true, 'representGuest' => $representGuest]);
    }
}
