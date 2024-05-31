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
        return Groups::where('workspace_id', Auth::user()->current_workspace)->get();
    }

    public function getAllProducts()
    {
        return Products::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) {
                $query->where('group_id', 0)
                    ->orWhereNull('group_id');
            })
            ->get();
    }

    public function getAllProductsExist($id)
    {
        return Products::where('workspace_id', Auth::user()->current_workspace)
            ->where(function ($query) use ($id) {
                $query->where('group_id', 0)
                    ->orWhereNull('group_id')
                    ->orWhere('group_id', $id);
            })
            ->get();
    }

    public function addGroup($data)
    {
        $exist = false;
        $check = Groups::where('name', $data['group_name'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if (!$check) {
            $datagroup = [
                'name' => $data['group_name'],
                'description' => $data['group_desc'],
                'workspace_id' => Auth::user()->current_workspace,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $group_id = DB::table($this->table)->insertGetId($datagroup);
            if (isset($data['product_id'])) {
                for ($i = 0; $i < count($data['product_id']); $i++) {
                    $product = Products::where('id', $data['product_id'][$i])
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
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
            ->where('workspace_id', Auth::user()->current_workspace)
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
            Products::where('group_id', $id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->update(['group_id' => null]);
            if (isset($data['product_id'])) {
                for ($i = 0; $i < count($data['product_id']); $i++) {
                    $product = Products::where('id', $data['product_id'][$i])
                        ->where('workspace_id', Auth::user()->current_workspace)
                        ->first();
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
