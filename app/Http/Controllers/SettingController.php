<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserWorkspaces;
use Illuminate\Support\Facades\Auth;
use App\Models\Workspace;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspace;
    private $users;
    private $roles;
    private $user_workspaces;
    private $setting;
    public function __construct()
    {
        $this->workspace = new Workspace();
        $this->users = new User();
        $this->roles = new Role();
        $this->user_workspaces = new UserWorkspaces();
        $this->setting = new Setting();
    }
    public function index()
    {
        $title = 'Thành viên';

        $allWorkSpace = UserWorkspaces::with('workspace')->where('user_id', Auth::user()->id)->get();
        $workspaceNames = [];

        foreach ($allWorkSpace as $workspace) {
            $workspaceNames[] = [
                'id' => $workspace->workspace->id,
                'workspace_name' => $workspace->workspace->workspace_name
            ];
        }

        $getworkspace = Auth::user()->origin_workspace;
        $issetworkspace = false;
        if ($getworkspace != null) {
            $issetworkspace = true;
        }
        $user_workspaces = $this->user_workspaces->getUsersWorkspace();
        $roles = $this->roles->getAll();
        // dd($roles);

        $invitation = Invitation::where('workspace_id', Auth::user()->current_workspace)->first();
        return view('settingview.members.index', compact('title', 'workspaceNames', 'issetworkspace', 'invitation', 'user_workspaces', 'roles'));
    }

    public function overview()
    {
        $title = 'Tổng quan';

        $workspace_name = $this->workspace->where('id', Auth::user()->current_workspace)->select('workspace_name')->first();
        $workspace_name = $workspace_name->workspace_name;

        return view('settingview.overview.index', compact('title', 'workspace_name'));
    }
    public function viewUser()
    {
        $title = 'Thông tin cá nhân';
        $user_info = Auth::user();
        return view('settingview.user.index', compact('title', 'user_info'));
    }
    public function viewCompany()
    {
        $title = 'Thông tin doanh nghiệp';
        $workspace_name = $this->workspace->where('id', Auth::user()->current_workspace)->first();

        return view('settingview.company.index', compact('title', 'workspace_name'));
    }
    // Func call deleteAllTable
    public function deleteAllTable()
    {
        $workspace_id = Auth::user()->current_workspace;
        $this->setting->deleteAllTable($workspace_id);
        return redirect()->route('dashboard');
        // return redirect()->back()->with('msg', 'Xóa dữ liệu thành công');
    }
    // Func ajax update user
    public function updateUser(Request $request)
    {
        $data = $request->all();
        $id = Auth::user()->id;
        $user = $this->users->updateUser($id, $data);
        if ($user) {
            return redirect()->back()->with('msg', 'Cập nhật thông tin thành công');
        }
        return redirect()->back()->with('warning', 'Cập nhật thông tin thất bại');
    }
    // Func ajax update workspaceName
    public function updateWorkspaceName(Request $request)
    {
        $data = $request->all();
        $id = Auth::user()->current_workspace;
        $workspace = $this->workspace->updateWorkspace($id, $data);
        if ($workspace) {
            return redirect()->back()->with('msg', 'Cập nhật thông tin thành công');
        }
        return redirect()->back()->with('warning', 'Cập nhật thông tin thất bại');
    }
    public function search(Request $request)
    {
        $data = $request->all();
        if ($request->ajax()) {
            $output = '';
            $users = $this->users->ajax($data);
            if ($users) {
                foreach ($users as $key => $user) {
                    $output .= '<div
                                class="row row-user d-flex align-items-center justify-content-center pt-2 m-0 border-bottom w-100">
                                <div class="col">
                                    <div class="info-user">
                                        <div class="name">' . $user->name . '</div>
                                        <p class="email"> ' . $user->email . '</p>
                                    </div>
                                </div>
                                <div class="col role d-flex justify-content-center">Admin</div>
                                <div class="col d-flex justify-content-end"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                            fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                            fill="#42526E"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                            fill="#42526E"></path>
                                    </svg></div>
                            </div>';
                }
            }
            return [
                'output' => $output,
            ];
        }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
