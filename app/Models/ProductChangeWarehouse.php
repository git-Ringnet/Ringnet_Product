<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductChangeWarehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_change_warehouse',
        'product_id',
        'product_name',
        'product_unit',
        'qty',
        'note',
        'workspace_id',
        'created_at',
    ];
    protected $table = 'product_change_warehouse';

    public function addChangeProduct($data, $id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $dataProduct = [
                'id_change_warehouse' => $id,
                'product_id' => isset($data['product_id'][$i]) ? $data['product_id'][$i] : null,
                'product_name' => isset($data['product_name'][$i]) ? $data['product_name'][$i] : null,
                'product_unit' => isset($data['product_unit'][$i]) ? $data['product_unit'][$i] : null,
                'qty' => isset($data['qty'][$i]) ? $data['qty'][$i] : null,
                'note' => isset($data['product_note'][$i]) ? $data['product_note'][$i] : null,
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            DB::table($this->table)->insert($dataProduct);
        }
    }
}
