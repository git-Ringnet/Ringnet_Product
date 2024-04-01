<?php

namespace App\View\Components;

use App\Models\UserWorkspaces;
use App\Models\Workspace;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $activeName;
    public $activeGroup;
    public $workspacename;
    public $workspaceNames;

    public function __construct($title = 'Ringnet', $activeName = 'activeName', $activeGroup = 'activeGroup', $workspacename = 'worksapcename', $workspaceNames = 'null')
    {
        // If you are not logged in, navigate to the login page
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $allWorkSpace = UserWorkspaces::with('workspace')->where('user_id', Auth::user()->id)->get();
        $workspaceNames = [];

        foreach ($allWorkSpace as $workspace) {
            $workspaceNames[] = [
                'id' => $workspace->workspace->id,
                'workspace_name' => $workspace->workspace->workspace_name
            ];
        }
        $this->workspaceNames = $workspaceNames;
        $this->title = $title;
        $this->activeName = $activeName;
        $this->activeGroup = $activeGroup;
        $this->workspacename = $workspacename;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
