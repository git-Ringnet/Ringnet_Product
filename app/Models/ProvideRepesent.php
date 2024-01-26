<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProvideRepesent extends Model
{
    use HasFactory;
    protected $table = 'represent_provide';

    protected $fillable = [
        'provide_id',
        'represent_name',
        'represent_email',
        'represent_phone',
        'represent_address',
    ];

    public function getDefault(){
        return $this->hasOne(GuestFormDate::class, 'date_form_id', 'id');
    }

    public function addRePesent($data, $provide_id)
    {
        if (isset($provide_id) && isset($data['represent_name'])) {
            for ($i = 0; $i < count($data['represent_name']); $i++) {
                $dataRepesent = [
                    'provide_id' => $provide_id,
                    'represent_name' => $data['represent_name'][$i],
                    'represent_email' => $data['represent_email'][$i],
                    'represent_phone' => $data['represent_phone'][$i],
                    'represent_address' => isset($data['represent_address'][$i]),
                    'created_at' => Carbon::now(),
                    'workspace_id' => Auth::user()->current_workspace
                ];
                $check = ProvideRepesent::where('provide_id', $provide_id)
                    ->where('represent_name', $data['represent_name'][$i])
                    ->where('represent_email', $data['represent_email'][$i])
                    ->where('represent_phone', $data['represent_phone'][$i])
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if (!$check) {
                    DB::table($this->table)->insertGetId($dataRepesent);
                }
            }
        } else {
            // dd(1);
        }
        // var_dump($provide_id);
        // dd($data);
    }
}
