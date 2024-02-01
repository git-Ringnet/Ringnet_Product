<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        'size'
    ];

    public function getUsers()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function addAttachment($data, $table_id, $table_name)
    {
        $status = false;
        $getFile = $data['file'];
        $name = $getFile->getClientOriginalName();
        $fullPath = storage_path('backup/' . $table_name);

        $checkFiles = Attachment::where('table_id', $table_id)
            ->where('table_name', $table_name)
            ->where('file_name', $name)->first();
        if ($checkFiles) {
            $filePath = $fullPath . '/' . $name;
            if (file_exists($filePath)) {
                // Nếu tồn tại, xóa file cũ
                unlink($filePath);
            }

            $status = false;
        } else {
            $fileSizeInBytes = $getFile->getSize();
            $fileSizeInKB = round($fileSizeInBytes / 1024, 2);
            $dataAttachment = [
                'table_id' => $table_id,
                'table_name' => $table_name,
                'file_name' => $name,
                'size' => $fileSizeInKB,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace
            ];
            DB::table($this->table)->insert($dataAttachment);
            $status = true;
        }
        $getFile->move($fullPath, $name);
        return $status;
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
