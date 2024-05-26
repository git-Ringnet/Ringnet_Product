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
        'grouptype_id',
        'name',
        'description',
    ];
    public function getAll()
    {
        return Groups::with('grouptype')->get();
    }

    public function groupType()
    {
        return $this->belongsTo(Grouptype::class, 'grouptype_id', 'id');
    }
    public function addGroup($data)
    {
        $exist = false;
        $datagroup = [
            'name' => $data['group_name_display'],
            'grouptype_id' => $data['grouptype_id'],
            'description' => $data['group_desc'],
            'workspace_id' => Auth::user()->current_workspace,
        ];
        DB::table($this->table)->insertGetId($datagroup);
        $existingGroup = Groups::where('name', $datagroup['name'])
            ->where('grouptype_id', $datagroup['grouptype_id'])
            ->where('workspace_id', $datagroup['workspace_id'])
            ->first();

        if ($existingGroup) {
            // If a duplicate group exists, return with an error message
            $exist = true;
        }
        return $exist;
    }
    public function updateGroup($data, $id)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }
    public function dataObj($idGr)
    {
        $data = [];
        if ($idGr == 1) {
            $data = [];
        } elseif ($idGr == 2) {
            $data = [
                'obj' => 'guest',
                'results' => Guest::where('group_id', 0)->where('workspace_id', Auth::user()->current_workspace)->select('guest.id as id', 'guest.guest_name_display as name')->get()
            ];
        } elseif ($idGr == 3) {
            $data = [
                'obj' => 'provides',
                'results' => Provides::where('group_id', 0)->where('workspace_id', Auth::user()->current_workspace)->select('provides.id as id', 'provides.provide_name_display as name')->get()
            ];
        } elseif ($idGr == 4) {
            $data = [
                'obj' => 'products',
                'results' => Products::where('group_id', 0)->where('workspace_id', Auth::user()->current_workspace)->select('products.id as id', 'products.product_name as name')->get()
            ];
        }
        return $data;
    }
    public function updateDataGroup($data)
    {
        DB::table($data['data_obj'])
            ->whereIn('id', $data['dataupdate'])
            ->update(['group_id' => $data['group_id']]);
        $grouptype = Groups::find($data['group_id']);
        $grouptype = $grouptype->grouptype_id;
        $dataRs = [];
        if ($grouptype == 1) {
            $dataRs = [];
        } elseif ($grouptype == 2) {
            $dataRs = [
                'obj' => 'guest',
                'results' => Guest::whereIn('id', $data['dataupdate'])->where('workspace_id', Auth::user()->current_workspace)
                    ->select('guest.id as id', 'guest.guest_name_display as name')->get()
            ];
        } elseif ($grouptype == 3) {
            $dataRs = [
                'obj' => 'provides',
                'results' => Provides::whereIn('id', $data['dataupdate'])->where('workspace_id', Auth::user()->current_workspace)
                    ->select('provides.id as id', 'provides.provide_name_display as name')->get()
            ];
        } elseif ($grouptype == 4) {
            $dataRs = [
                'obj' => 'products',
                'results' => Products::whereIn('id', $data['dataupdate'])->where('workspace_id', Auth::user()->current_workspace)
                    ->select('products.id as id', 'products.product_name as name')->get()
            ];
        }
        return $dataRs;
    }
    public function getDataGroup($id)
    {
        $grouptype = Groups::find($id);
        $grouptype = $grouptype->grouptype_id;
        $data = [];
        if ($grouptype == 1) {
            $data = [];
        } elseif ($grouptype == 2) {
            $data = [
                'obj' => 'guest',
                'results' => Guest::where('group_id', $id)->where('workspace_id', Auth::user()->current_workspace)
                    ->select('guest.id as id', 'guest.guest_name_display as name')->get()
            ];
        } elseif ($grouptype == 3) {
            $data = [
                'obj' => 'provides',
                'results' => Provides::where('group_id', $id)->where('workspace_id', Auth::user()->current_workspace)
                    ->select('provides.id as id', 'provides.provide_name_display as name')->get()
            ];
        } elseif ($grouptype == 4) {
            $data = [
                'obj' => 'products',
                'results' => Products::where('group_id', $id)->where('workspace_id', Auth::user()->current_workspace)
                    ->select('products.id as id', 'products.product_name as name')->get()
            ];
        }
        return $data;
    }
}
