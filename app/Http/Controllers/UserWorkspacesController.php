<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWorkspaces;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $users = User::all();
        return view('users.index', compact(
            'users',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('roleid', '!=', 1)->get();
        return view('users.add', compact(
            'users',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $check = User::where('email', $request->email)->first();
        if ($check == null) {
            $account = new User();
            $account->name = $request->name;
            $account->email = $request->email;
            $account->password = Hash::make($request->password);
            $account->roleid = 2;
            $account->provider = 'login';
            $account->provider_id = 1;
            $account->current_workspace = 1;
            $account->save();

            return redirect()->route('users.index')->with('msg', 'Tài khoản đã được thêm thành công.');
        } else {
            return redirect()->back()->with('warning', 'Email đã tồn tại!');
        }
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
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('users.edit', compact(
            'users',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Kiểm tra xem mật khẩu có được nhập hay không
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('users.index')->with('msg', 'Tài khoản đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = User::findOrFail($id);
        $account->delete();
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
