<?php

namespace App\Http\Middleware;

use App\Models\Workspace;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWorkspace
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $workspaceName = $request->route('workspace');
        $workspace = Workspace::where('workspace_name', $workspaceName)->first();

        if (!$workspace) {
            abort(404); // Hoặc xử lý lỗi khác tùy ý của bạn
        }

        // Truyền workspace vào request để có thể sử dụng trong controller
        $request->merge(['workspace' => $workspace]);

        return $next($request);
    }
}
