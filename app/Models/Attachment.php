<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attachment extends Model
{
    use HasFactory;
    protected $table = 'attachment';

    protected $fillable = [
        'table_id',
        'table_name',
        'file_name',
        'user_id',
    ];

    public function getUsers()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function addAttachment($data,$table_id,$table_name)
    {
        $getFile = $data['file'];
        $name = $getFile->getClientOriginalName();
        $fullPath = storage_path('backup');
        $getFile->move($fullPath, $name);
        $dataAttachment = [
            'table_id' => $table_id,
            'table_name' => $table_name,
            'file_name' => $name,
            'user_id' => 1,
            'created_at' => Carbon::now(),
        ];
        DB::table($this->table)->insert($dataAttachment);
    }
}
