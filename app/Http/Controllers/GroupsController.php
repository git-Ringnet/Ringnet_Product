<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Grouptype;
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
    public function show(Groups $groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Groups $groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groups $groups)
    {
        //
    }
}
