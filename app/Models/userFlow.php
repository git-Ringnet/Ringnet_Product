<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserFlow extends Model
{
    use HasFactory;

    protected $table = 'user_flow';

    public function getAll($data)
    {
        $result = DB::table($this->table)->whereIn('user_flow.activity_type', $data)
            ->leftJoin('users', 'users.id', 'user_flow.user_id')
            ->select('user_flow.*','users.name as name_user')
            ->orderBy('user_flow.id', 'desc')
            ->get();
        return $result;
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function addUserFlow($data)
    {
        $dataUserFlow = [
            'user_id' => Auth::user()->id,
            'activity_type' => $data['name'],
            'activity_description' => $data['des'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table($this->table)->insert($dataUserFlow);
    }
}
