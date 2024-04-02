<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Workspace extends Model
{
    use HasFactory;
    protected $table = 'workspaces';

    protected $fillable = [
        'user_id',
        'workspace_name',
        'name_company',
        'phone_number',
        'address_company',
        'mst',
        'name_bank',
        'number_bank',
    ];

    public function updateWorkspace($id, $data)
    {
        $workspace = self::find($id);
        if ($workspace) {
            $workspace->update($data);
            return $workspace;
        }
        return null;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getAll($idUser)
    {
        return Workspace::where('user_id', $idUser)->get();
    }
    public function getNameWorkspace($idWorkspaceCurrent)
    {
        return DB::table($this->table)->where('id', $idWorkspaceCurrent)->first();
    }
}
