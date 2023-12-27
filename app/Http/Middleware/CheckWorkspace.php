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
    public function handle(Request $request, Closure $next)
    {
        $workspaceName = $request->route('workspace');
        $workspace = Workspace::where('workspace_name', $workspaceName)->first();
        dd($workspace);
        if (!$workspace) {
            abort(404); // Hoặc xử lý lỗi khác tùy ý của bạn
        }

        // Kiểm tra nếu user_id của người dùng hiện tại có tồn tại trong workspace
        $currentUserId = auth()->id();
        dd($workspace->user());
        // if (!$workspace->user()->where('user_id', $currentUserId)->exists()) {
        //     abort(403); // Hoặc xử lý lỗi khác tùy ý của bạn nếu người dùng không có quyền truy cập workspace này
        // }

        // Truyền workspace vào request để có thể sử dụng trong controller
        $request->merge(['workspace' => $workspace]);

        return $next($request);
    }
}
