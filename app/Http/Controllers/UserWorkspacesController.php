<?php

namespace App\Http\Controllers;

use App\Models\UserWorkspaces;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserWorkspacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $user_workspaces;

    public function __construct()
    {
        $this->user_workspaces = new UserWorkspaces();
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserWorkspaces $userWorkspaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserWorkspaces $userWorkspaces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserWorkspaces $userWorkspaces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $this->user_workspaces->deleteUser($id);
        return back()->with('msg', 'Xóa người dùng thành công!');
    }
    public function updateRoleWorkspace(Request $request)
    {
        // Xử lý dữ liệu ở đây và trả về kết quả
        $data = $request->all();
        $this->user_workspaces->updateUserWorkspace($data);
        return response()->json(['success' => true, 'data' => $data, 'msg' => 'Cập nhật vai trò thành công!',]);
    }
    public function searchUserWorkspace(Request $request)
    {
        $data = $request->all();
        if ($request->ajax()) {
            $user_workspaces = $this->user_workspaces->ajax($data);

            return $user_workspaces;
        }
        return false;
    }
    public function deleteUserWorkspace(Request $request)
    {
        $data = $request->all();
        if ($request->ajax()) {
            $user_workspaces = $this->user_workspaces->deleteUser($data);
            return $user_workspaces;
        }
        return false;
    }
}
