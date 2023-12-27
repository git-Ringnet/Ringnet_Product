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
    ];

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
