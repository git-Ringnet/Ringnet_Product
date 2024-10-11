<?php

namespace App\Models;

use Carbon\Carbon;
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
            //Thêm thủ kho
            if (isset($data['name'])) {
                for ($i = 0; $i < count($data['name']); $i++) {
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
                    DB::table('warehouse_manager')->insert($warehouse_manager);
                }
            }
        } else {
            $status = ['status' => false];
        }
        return $status;
    }

    public function updateWarehouse($id, $data)
    {
        if ($this->checkWarehouseEdit($data['warehouse_name'], $id)) {
            $dataWarehouse = [
                'warehouse_name' => $data['warehouse_name'],
                'warehouse_address' => $data['warehouse_address'],
                'warehouse_code' => $data['warehouse_code'],
            ];
            DB::table($this->table)->where('id', $id)->update($dataWarehouse);
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
    public function checkWarehouseEdit($name, $id)
    {
        $exists = DB::table($this->table)
            ->where('warehouse_name', $name)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->where('id', '!=', $id)
            ->exists();

        return !$exists;
    }

    public function ajax($data)
    {
        $warehouse =  DB::table($this->table)->where('workspace_id', Auth::user()->current_workspace);
        if (isset($data['search'])) {
            $warehouse = $warehouse->where(function ($query) use ($data) {
                $query->orWhere('warehouse_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('warehouse_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('warehouse_address', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['warehouseCode']) && !empty($data['warehouseCode'])) {
            $warehouse = $warehouse->where('warehouse_code', 'like', '%' . $data['warehouseCode'] . '%');
        }
        if (isset($data['warehouseName']) && !empty($data['warehouseName'])) {
            $warehouse = $warehouse->where('warehouse_name', 'like', '%' . $data['warehouseName'] . '%');
        }
        if (isset($data['address']) && !empty($data['address'])) {
            $warehouse = $warehouse->where('warehouse_address', 'like', '%' . $data['address'] . '%');
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $warehouse = $warehouse->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $warehouse = $warehouse->get();
        return $warehouse;
    }
    public function ajaxDetailWH($data)
    {
        $warehouse = ProductWarehouse::where('productwarehouse.warehouse_id', $data['data'])
            ->leftJoin('products', 'productwarehouse.product_id', 'products.id')
            ->leftJoin('warehouse', 'warehouse.id', 'productwarehouse.warehouse_id')
            ->where('productwarehouse.workspace_id', Auth::user()->current_workspace)
            ->select('productwarehouse.*', 'products.*');
        if (isset($data['search'])) {
            $warehouse = $warehouse->where(function ($query) use ($data) {
                $query->orWhere('products.product_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('products.product_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('warehouse_address', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['ma']) && !empty($data['ma'])) {
            $warehouse = $warehouse->where('products.product_code', 'like', '%' . $data['ma'] . '%');
        }
        if (isset($data['ten']) && !empty($data['ten'])) {
            $warehouse = $warehouse->where('products.product_name', 'like', '%' . $data['ten'] . '%');
        }
        if (isset($data['dvt']) && !empty($data['dvt'])) {
            $warehouse = $warehouse->where('products.product_unit', 'like', '%' . $data['dvt'] . '%');
        }
        if (isset($data['soluongton'][0]) && isset($data['soluongton'][1])) {
            $warehouse = $warehouse->where('productwarehouse.qty', $data['soluongton'][0], $data['soluongton'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $warehouse = $warehouse->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $warehouse = $warehouse->get();
        return $warehouse;
    }
}
