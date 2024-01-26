<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkspaces extends Model
{
    use HasFactory;
    protected $table = 'user_workspaces';

    protected $fillable = [
        'user_id',
        'workspace_id',
    ];

    public function getAll($idUser)
    {
        return UserWorkspaces::where('user_id', $idUser)->get();
    }
    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }
}
