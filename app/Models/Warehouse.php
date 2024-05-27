<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    protected $fillable = [
        'warehouse_name',
        'warehouse_address',
        'workspace_id',
        'workspace_id',
        'warehouse_code'
    ];
    public function getAllWareHouse()
    {
        return DB::table($this->table)->get();
    }
    public function addNewWarehouse($data)
    {
        $status = [];
        if ($this->checkWarehouse($data['warehouse_name'])) {
            $dataWarehouse = [
                'warehouse_name' => $data['warehouse_name'],
                'warehouse_address' => $data['warehouse_address'],
                'warehouse_code' => $data['warehouse_code'],
                'user_id' => Auth::user()->id,
                'workspace_id' => Auth::user()->current_workspace
            ];
            $id = DB::table($this->table)->insertGetId($dataWarehouse);
            $status = ['status' => true, 'id' => $id];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }

    public function updateWarehouse($id, $data)
    {
        if ($this->checkWarehouse($data['warehouse_name'])) {
            $dataWarehouse = [
                'warehouse_name' => $data['warehouse_name'],
                'warehouse_address' => $data['warehouse_address'],
                'warehouse_code' => $data['warehouse_code'],
            ];
            DB::table($this->table)->where('id',$id)->update($dataWarehouse);
            $status = ['status' => true];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }

    public function checkWarehouse($name)
    {
        $exists = DB::table($this->table)
            ->where('warehouse_name', $name)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->exists();

        return !$exists;
    }
}
