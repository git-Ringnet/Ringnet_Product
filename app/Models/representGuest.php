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
        'workspace_id',
        'created_at',
        'updated_at'
    ];

    public function getRepresentGuest($id)
    {
        $representGuest = representGuest::where('guest_id', $id)->get();
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
}
