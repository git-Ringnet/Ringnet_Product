<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
