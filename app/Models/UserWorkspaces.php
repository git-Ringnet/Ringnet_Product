<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserWorkspaces extends Model
{
    use HasFactory;
    protected $table = 'user_workspaces';

    protected $fillable = [
        'user_id',
        'workspace_id',
        'roleid',
    ];

    public function getAll($idUser)
    {
        return UserWorkspaces::where('user_id', $idUser)->get();
    }
    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }
    public function getUsersWorkspace()
    {
        return self::join('users', 'user_workspaces.user_id', '=', 'users.id')
            ->leftJoin('roles', 'user_workspaces.roleid', '=', 'roles.id')
            ->leftJoin('workspaces', 'workspaces.id', '=', 'user_workspaces.workspace_id')
            ->where('user_workspaces.workspace_id', Auth::user()->current_workspace)
            ->select('user_workspaces.*', 'users.*', 'roles.name as vaitro', 'workspaces.workspace_name as nameWP')
            ->get();
    }
    public function updateUserWorkspace($data)
    {
        $user = UserWorkspaces::where('user_id', $data['idUser'])->first();
        if ($user) {
            $user->update(['roleid' => $data['roleid']]);
            return true;
        }
        return false;
    }
    public function ajax($data)
    {
        $user_workspaces = DB::table($this->table)->join('users', 'user_workspaces.user_id', '=', 'users.id')
            ->leftJoin('roles', 'user_workspaces.roleid', '=', 'roles.id')
            ->leftJoin('workspaces', 'workspaces.id', '=', 'user_workspaces.workspace_id')
            ->where('user_workspaces.workspace_id', Auth::user()->current_workspace)
            ->select('user_workspaces.*', 'users.*', 'roles.name as vaitro', 'workspaces.workspace_name as nameWP');
        if (isset($data['search'])) {
            $user_workspaces = $user_workspaces->where(function ($query) use ($data) {
                $query->orWhere('users.name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('users.email', 'like', '%' . $data['search'] . '%');
            });
        }
        $user_workspaces = $user_workspaces->get();
        return $user_workspaces;
    }
    public function deleteUser($id)
    {
        if (!empty($id)) {
            UserWorkspaces::where('user_id', $id)->delete();
        }
    }
}
