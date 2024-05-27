<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentGroups extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contenttype_id',
        'description',
        'created_at',
        'updated_at',
        'workspace_id',
        'user_id',
    ];
    protected $table = 'contentgroups';



    public function createContentGroup($data)
    {
        $status = [];
        if (!$this->checkContentGroup("", $data['type'], $data['content'])) {
            $dataContentG = [
                'name' => $data['content'],
                'contenttype_id' => $data['type'],
                'created_at' => Carbon::now(),
                'workspace_id' => Auth::user()->current_workspace,
                'user_id' => Auth::user()->id
            ];
            $id = DB::table($this->table)->insertGetId($dataContentG);
            $status = [
                'status' => true,
                'id' => $id,
            ];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }

    public function updateContentGroup($id, $data)
    {
        if (!$this->checkContentGroup($id, $data['type'], $data['content'])) {
            $dataContentG = [
                'name' => $data['content'],
                'contenttype_id' => $data['type'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            DB::table($this->table)->where('id', $id)->update($dataContentG);
            $status = [
                'status' => true,
            ];
        } else {
            $status = ['status' => false];
        }
        return $status;
    }


    public function checkContentGroup($id, $type_id, $name)
    {
        $getData = DB::table($this->table)->where('contenttype_id', $type_id)
            ->where('name', $name);
        if (isset($id)) {
            $getData->where('id', '!=', $id);
        }
        $getData = $getData->first();
        if (isset($getData)) {
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }

    public function deleteContentGroup($id)
    {
        $status = [];
        $getData = DB::table($this->table)->where('id', $id)->first();
        if ($getData) {
            DB::table($this->table)->where('id', $id)->delete();
            $status = [
                'status' => true
            ];
        } else {
            $status = [
                'status' => false
            ];
        }
        return $status;
    }
}
