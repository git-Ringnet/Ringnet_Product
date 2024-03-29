<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\User;
use App\Models\UserWorkspaces;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class WorkspaceController extends Controller
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

        $invitation = Invitation::where('workspace_id', Auth::user()->current_workspace)->first();
        return view('dashboard', compact('title', 'workspaceNames', 'issetworkspace', 'invitation'));
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
    public function updateWorkspaceUser(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->idUser;
            $data = [
                'current_workspace' => $request->workspaceId,
            ];
            $new_user = $this->user->updateWorkSpaceUser($id, $data);
            $msg = response()->json([
                'success' => true,
                'msg' => 'Cập nhật thành công',
                'new_date_form' => $new_user,
            ]);
            return $msg;
        }
    }
}
