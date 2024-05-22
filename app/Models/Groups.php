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
}
