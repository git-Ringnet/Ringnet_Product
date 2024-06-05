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
    ];
    public function getAllWareHouse()
    {
        return DB::table('warehouse')
            ->leftjoin('products', 'products.warehouse_id', '=', 'warehouse.id')
            ->where('warehouse.workspace_id', Auth::user()->current_workspace)
            ->groupBy(
                'warehouse.id',
                'warehouse.warehouse_name',
                'warehouse.workspace_id',
                'warehouse.warehouse_code',
                'warehouse.warehouse_address',
            )
            ->select(
                'warehouse.id',
                'warehouse.warehouse_name',
                'warehouse.warehouse_code',
                'warehouse.warehouse_address',
                'warehouse.workspace_id',
                DB::raw('SUM(products.product_inventory) AS total_inventory')
            )
            ->get();
    }
    public function getAllProducts()
    {
        return Products::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) {
                $query->where('warehouse_id', 0)
                    ->orWhereNull('warehouse_id');
            })
            ->get();
    }

    public function getAllProductsExist($id)
    {
        return Products::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($id) {
                $query->where('warehouse_id', 0)
                    ->orWhereNull('warehouse_id')
                    ->orWhere('warehouse_id', $id);
            })
            ->get();
    }

    public function addWarehouse($data)
    {
        $exist = false;
        $check = Warehouse::where('warehouse_name', $data['warehouse_name'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if (!$check) {
            $dataWarehouse = [
                'warehouse_name' => $data['warehouse_name'],
                'warehouse_code' => $data['warehouse_code'],
                'warehouse_address' => $data['warehouse_address'],
                'user_id' => Auth::user()->id,
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table($this->table)->insertGetId($dataWarehouse);
        } else {
            $exist = true;
        }
        return $exist;
    }
    public function updateWarehouse($data, $id)
    {
        $exist = false;
        $check = Warehouse::where('warehouse_name', $data['warehouse_name'])
            ->where('id', '!=', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if (!$check) {
            $warehouse = Warehouse::find($id);
            if ($warehouse) {
                $dataWarehouse = [
                    'warehouse_name' => $data['warehouse_name'],
                    'warehouse_code' => $data['warehouse_code'],
                    'warehouse_address' => $data['warehouse_address'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Warehouse::where('id', $id)->update($dataWarehouse);
            }
        } else {
            $exist = true;
        }
        return $exist;
    }
}
