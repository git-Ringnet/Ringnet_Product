<?php

namespace App\Models;

use App\Http\Controllers\ProductChangeWarehouseController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChangeWarehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_warehouse',
        'to_warehouse',
        'workspace_id',
        'user_id',
        'note',
        'created_at',
        'updated_at',
        'change_warehouse_code',
        'manager_warehouse',
        'type_change_warehouse'
    ];
    protected $table = 'change_warehouse';

    public function getFromWarehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'from_warehouse');
    }

    public function getToWarehouse()
    {
        return $this->hasOne(Warehouse::class, 'id', 'to_warehouse');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function addChangeWarehouse($data, $type)
    {
        $result = [];
        $dataChange = [
            'manager_warehouse' => $data['manager_warehouse'],
            'change_warehouse_code' => isset($data['change_warehouse_code']) ? $data['change_warehouse_code'] : "",
            'from_warehouse' => $data['from_warehouse'],
            'to_warehouse' => $data['to_warehouse'],
            'workspace_id' => Auth::user()->current_workspace,
            'user_id' => Auth::user()->id,
            'note' => isset($data['note']) ? $data['note'] : "",
            'created_at' => isset($data['created_at']) ? $data['created_at'] : Carbon::now(),
            'type_change_warehouse' => $type,
        ];
        foreach ($dataChange as $key => $value) {
            if (is_array($value)) {
                $dataChange[$key] = json_encode($value);
            }
        }
        $id = DB::table($this->table)->insertGetId($dataChange);
        if ($id) {
            $result['status'] = true;
            $result['id'] = $id;
        } else {
            $result['status'] = false;
        }

        return $result;
    }

    public function deleteChangeWarehouse($id)
    {
        $status = [];

        $changeWarehouse = ChangeWarehouse::where('id', $id)->first();
        if ($changeWarehouse) {
            ProductChangeWarehouse::where('id_change_warehouse', $changeWarehouse->id)->delete();
            ChangeWarehouse::where('id', $changeWarehouse->id)->delete();
            $status['status'] = true;
        } else {
            $status['status'] = false;
        }
        return $status;
    }
}
