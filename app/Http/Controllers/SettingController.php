<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
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
    private $user;
    private $user_workspaces;
    public function __construct()
    {
        $this->workspace = new Workspace();
        $this->user = new User();
        $this->user_workspaces = new UserWorkspaces();
    }
    public function index()
    {
        $title = 'Danh sách workspace';

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
        // dd($user_workspaces);

        $invitation = Invitation::where('workspace_id', Auth::user()->current_workspace)->first();
        return view('settingview.members.index', compact('title', 'workspaceNames', 'issetworkspace', 'invitation', 'user_workspaces'));
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
