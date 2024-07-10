<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Guest;
use App\Models\Role;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspaces;
    public function __construct()
    {
        $this->workspaces = new Workspace();
    }
    public function index()
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = 'Nhân viên';
        $users = User::all();
        return view('tables.user.index', compact('users', 'title', 'workspacename'));
    }

    public function create()
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = "Thêm mới nhân viên";
        $groups = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $roles = Role::where('id', '!=', 1)->get();
        return view('tables.user.create', compact('title', 'groups', 'workspacename', 'roles'));
    }

    public function store(string $workspace, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string|min:6',
            'address' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ], [
            'user_code.required' => 'Mã nhân viên là bắt buộc.',
            'user_code.string' => 'Mã nhân viên phải là một chuỗi.',
            'user_code.max' => 'Mã nhân viên không được vượt quá 255 ký tự.',
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'password.nullable' => 'Mật khẩu không bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'phone_number.nullable' => 'Số điện thoại không bắt buộc.',
            'phone_number.string' => 'Số điện thoại phải là một chuỗi.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        ]);
        User::create([
            'user_code' => $request->user_code,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'provider' => 'login',
            'phone_number' => $request->phone_number,
            'roleid' => $request->role_id,
            'group_id' => $request->grouptype_id,
        ]);

        return redirect()->route('users.index', ['workspace' => $workspace])->with('msg', 'Tạo mới người dùng thành công.');
    }

    public function show(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $user = User::find($id);
        $title = 'Chi tiết nhân viên ' . $user->name;
        $groups = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $roles = Role::where('id', '!=', 1)->get();

        return view('tables.user.show', compact('title', 'groups', 'user', 'workspacename', 'title', 'roles'));
    }

    public function edit(string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $user = User::find($id);
        $title = 'Chỉnh sửa nhân viên ' . $user->name;
        $groups = Groups::where('grouptype_id', 1)->where('workspace_id', Auth::user()->current_workspace)->get();
        $roles = Role::where('id', '!=', 1)->get();

        return view('tables.user.edit', compact('title', 'groups', 'user', 'workspacename', 'title', 'roles'));
    }

    public function update(string $workspace, Request $request, string $id)
    {
        // Validate incoming data
        $request->validate([
            'user_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'address' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ], [
            'user_code.required' => 'Mã nhân viên là bắt buộc.',
            'user_code.string' => 'Mã nhân viên phải là một chuỗi.',
            'user_code.max' => 'Mã nhân viên không được vượt quá 255 ký tự.',
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.unique' => 'Email này đã tồn tại.',
            'password.nullable' => 'Mật khẩu không bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'phone_number.nullable' => 'Số điện thoại không bắt buộc.',
            'phone_number.string' => 'Số điện thoại phải là một chuỗi.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        ]);
        // Find the user by ID
        $user = User::findOrFail($id);
        // Update user information
        $userData = [
            'user_code' => $request->user_code,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'provider' => 'login',
            'phone_number' => $request->phone_number,
            'role_id' => $request->role_id,
            'group_id' => $request->grouptype_id,
        ];

        // Check if password is provided and update accordingly
        if (!empty($request->password)) {
            $userData['password'] = bcrypt($request->password);
        }

        $user->update($userData);

        // Redirect back with success message
        return redirect()->route('users.index', ['workspace' => $workspace])->with('msg', 'Cập nhật nhân viên thành công!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('msg', 'User deleted successfully.');
    }
}
