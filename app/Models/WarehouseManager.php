<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WarehouseManager extends Model
{
    use HasFactory;
    protected $table = 'warehouse_manager';
    protected $fillable = [
        'warehouse_id',
        'name',
        'phone',
        'email',
        'workspace_id',
    ];
    public function updateWarehouseManager($id, $data)
    {
        $manager_id = [];

        if (isset($data['name'])) {
            for ($i = 0; $i < count($data['name']); $i++) {
                // Kiểm tra nếu mảng manager_id tồn tại và phần tử tại vị trí $i tồn tại
                if (isset($data['manager_id']) && isset($data['manager_id'][$i])) {
                    $check = WarehouseManager::where('id', $data['manager_id'][$i])->first();

                    if ($check) {
                        // Cập nhật thông tin quản lý kho
                        $check->name = $data['name'][$i];
                        $check->phone = $data['phone'][$i];
                        $check->email = $data['email'][$i];
                        $check->save();

                        // Đẩy manager_id vào mảng
                        $manager_id[] = $check->id;
                    }
                } else {
                    // Tạo mới quản lý kho
                    $warehouse_manager = [
                        'warehouse_id' => $id,
                        'name' => $data['name'][$i],
                        'phone' => $data['phone'][$i],
                        'email' => $data['email'][$i],
                        'user_id' => Auth::user()->id,
                        'workspace_id' => Auth::user()->current_workspace,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];

                    // Chèn bản ghi mới vào bảng warehouse_manager và lấy ID mới
                    $new_id = DB::table('warehouse_manager')->insertGetId($warehouse_manager);

                    // Đẩy ID mới vào mảng
                    $manager_id[] = $new_id;
                }
            }

            // Xóa các quản lý kho không nằm trong mảng manager_id
            WarehouseManager::where('warehouse_id', $id)->whereNotIn('id', $manager_id)->delete();
        }
    }
}
