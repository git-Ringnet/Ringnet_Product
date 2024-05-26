<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Grouptype;
use App\Models\Guest;
use App\Models\Workspace;
use App\Models\userFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $workspaces;
    private $groups;
    private $userFlow;

    public function __construct()
    {
        $this->workspaces = new Workspace();
        $this->groups = new Groups();
        $this->userFlow = new userFlow();
    }
    public function index()
    {
        $title = 'Nhóm đối tượng';
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $groups = $this->groups->getAll();

        // dd($groups);
        return view('tables.groups.index', compact('title', 'groups', 'workspacename'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grouptypes = Grouptype::all();
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $title = "Thêm mới nhóm đối tượng";
        return view('tables.groups.create', compact('title', 'grouptypes', 'workspacename'));
    }
    public function dataObj(Request $request)
    {
        $data = $request->all();
        $dataGroup = $this->groups->dataObj($data['group_id']);
        return $dataGroup;
    }
    public function updateDataGroup(Request $request)
    {
        $data = $request->all();
        $dataGroup = $this->groups->updateDataGroup($data);
        return $dataGroup;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $workspace, Request $request)
    {
        $result = $this->groups->addGroup($request->all());
        if ($result == true) {
            $msg = redirect()->back()->with('msg', 'Nhóm đối tượng đã tồn tại');
        } else {
            $arrCapNhatKH = [
                'name' => 'KH',
                'des' => 'Lưu nhóm đối tượng'
            ];
            $this->userFlow->addUserFlow($arrCapNhatKH);
            $msg = redirect()->route('groups.index', ['workspace' => $workspace])->with('msg', 'Thêm mới nhóm đối tượng thành công');
        }
        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $workspace, string $id)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $group = Groups::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        dd($group);
        if ($group) {
            $title = $group->name;
        } else {
            abort('404');
            $title = '';
            return view('tables.groups.show', compact('title', 'group', 'workspacename'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id, Request $request)
    {
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $group = Groups::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        // dd($group);
        if ($group) {
            $title = $group->name;
        } else {
            abort('404');
            $title = '';
        }
        $getId = $id;
        $request->session()->put('idGr', $id);
        $grouptypes = Grouptype::all();
        $dataGroup = $this->groups->getDataGroup($id);
        // dd($dataGroup);
        return view('tables.groups.edit', compact('title', 'group', 'dataGroup', 'grouptypes', 'workspacename'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $id = session('idGr');
        $data = [
            'name' => $request->group_name_display,
            'grouptype_id' => $request->grouptype_id,
            'description' => $request->group_desc,
            'workspace_id' => Auth::user()->current_workspace,
        ];
        $this->groups->updateGroup($data, $id);
        session()->forget('idGr');
        return redirect(route('groups.index', ['workspace' => $workspace]))->with('msg', 'Sửa nhóm đối tượng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $workspace, string $id)
    {
        $group = Groups::find($id);
        if (!$group) {
            return back()->with('warning', 'Không tìm thấy loại đối tượng xóa');
        }
        $check = Guest::where('group_id', $id)->first();
        if ($check) {
            return back()->with('warning', 'Xóa thất bại do loại đối tượng vẫn đang còn sử dụng!');
        }
        $group->delete();
        $arrCapNhatKH = [
            'name' => 'KH',
            'des' => 'Xóa loại đối tượng'
        ];
        $this->userFlow->addUserFlow($arrCapNhatKH);
        return back()->with('msg', 'Xóa loại đối tượng thành công');
    }
}
