<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userFlow extends Model
{
    use HasFactory;
    protected $table = 'user_flow';
    protected $fillable = [
        'user_id',
        'activity_type',
        'activity_description',
    ];
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
