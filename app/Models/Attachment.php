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
    public function addAttachment($data, $table_id, $table_name)
    {
        $getFile = $data['file'];
        $name = $getFile->getClientOriginalName();
        $fullPath = storage_path('backup/' . $table_name);
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
    public function deleteFile($file, $id, $table_name)
    {
        DB::table($this->table)
            ->where('id', $id)
            ->where('table_name', $table_name)
            ->delete();

        $backupPath = storage_path('backup/' . $table_name . '/');
        // Kiểm tra xem tệp tồn tại trước khi xóa
        if (file_exists($backupPath . $file)) {
            unlink($backupPath . $file);
            // Hoặc nếu bạn muốn xóa tệp zip nếu tồn tại
            // $zipFile = str_replace('.sql', '.zip', $file);
            // if (file_exists($backupPath . $zipFile)) {
            //     unlink($backupPath . $zipFile);
            // }
        }
    }
}
