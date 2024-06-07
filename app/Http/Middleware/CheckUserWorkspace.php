<?php

namespace App\Http\Middleware;

use App\Models\UserWorkspaces;
use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserWorkspace
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            $exitsUserWP = UserWorkspaces::where('user_id', $user->id)->first();
            if ($exitsUserWP) {
                $currentUser = $user->current_workspace;
                $nameCurrentWP = Workspace::where('id', $currentUser)->select('workspace_name')->first();
                return redirect()->route('welcome', $nameCurrentWP->workspace_name);
            } else {
                return redirect()->route('workspace.index');
            }
        }

        return $next($request);
    }
}
