<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Groups extends Model
{
    use HasFactory;
    protected $table = 'groups';

    protected $fillable = [
        'name',
        'description',
    ];
    public function getAll()
    {
        return Groups::all();
    }

    public function getAllProducts()
    {
        return Products::where('group_id', 0)
            ->orWhereNull('group_id')
            ->get();
    }

    public function getAllProductsExist($id)
    {
        return Products::where('group_id', 0)
            ->orWhereNull('group_id')
            ->orWhere('group_id', $id)
            ->get();
    }

    public function addGroup($data)
    {
        $exist = false;
        $check = Groups::where('name', $data['group_name'])->first();
        if (!$check) {
            $datagroup = [
                'name' => $data['group_name'],
                'description' => $data['group_desc'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $group_id = DB::table($this->table)->insertGetId($datagroup);
            if (isset($data['product_id'])) {
                for ($i = 0; $i < count($data['product_id']); $i++) {
                    $product = Products::find($data['product_id'])->first();
                    $product->group_id = $group_id;
                    $product->save();
                }
            }
        } else {
            $exist = true;
        }
        return $exist;
    }
    public function updateGroup($data, $id)
    {
        $exist = false;
        $check = Groups::where('name', $data['group_name'])
            ->where('id', '!=', $id)
            ->first();
        if (!$check) {
            $group = Groups::find($id);
            if ($group) {
                $dataGroup = [
                    'name' => $data['group_name'],
                    'description' => $data['group_desc'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Groups::where('id', $id)->update($dataGroup);
            }
            Products::where('group_id', $id)->update(['group_id' => null]);
            if (isset($data['product_id'])) {
                for ($i = 0; $i < count($data['product_id']); $i++) {
                    $product = Products::where('id', $data['product_id'][$i])->first();
                    $product->group_id = $id;
                    $product->save();
                }
            }
        } else {
            $exist = true;
        }
        return $exist;
    }
}
