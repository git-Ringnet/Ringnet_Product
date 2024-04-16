<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\User;
use App\Models\User_Role;
use App\Models\UserWorkspaces;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        if (!$user->workspaces()->exists()) {
            Workspace::create([
                'user_id' => $user->id,
            ]);
        }
        $workspaceId = Session::get('workspace_id');
        $token = Session::get('token');

        $emailExists = Invitation::where('email', $getInfo->email)->exists();
        if ($emailExists) {
            $invitation = Invitation::where('workspace_id', $workspaceId)->where('email', $getInfo->email)->first();
        } else {
            $invitation = Invitation::where('token', $token)->where('workspace_id', $workspaceId)->first();
        }
        // dd(!$invitation->status);

        if ($workspaceId && $invitation->status != 0) {

            $existingRecord = UserWorkspaces::where('user_id', $user->id)
                ->where('workspace_id', $workspaceId)
                ->first();

            // Nếu không có bản ghi, thêm mới
            if (!$existingRecord) {
                UserWorkspaces::create([
                    'workspace_id' => $workspaceId,
                    'user_id' => $user->id,
                    'roleid' => $invitation->roleid,
                ]);
                $user = User::findOrFail($user->id);
                $user->update(['current_workspace' => $workspaceId]);
            }
        }
        // Kiểm tra xem nếu có workspace rồi thì dô thẳng
        $exitsUserWP = UserWorkspaces::where('user_id', $user->id)
            ->first();
        if ($exitsUserWP) {
            // Lấy id gần nhất của workspace
            $currentUser = User::where('id', $user->id)->select('current_workspace')->first();
            // lấy tên workspace đó
            $nameCurrentWP = Workspace::where('id', $currentUser->current_workspace)->select('workspace_name')->first();
            auth()->login($user);
            return redirect()->route('welcome', $nameCurrentWP->workspace_name);
        }
        Session::forget('workspace_id');
        Session::forget('token');
        auth()->login($user);
        return redirect()->route('dashboard');
    }


    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();

        $workspaceId = Session::get('workspace_id');
        $token = Session::get('token');

        $emailExists = Invitation::where('email', $getInfo->email)->exists();
        if ($emailExists) {
            $invitation = Invitation::where('workspace_id', $workspaceId)->where('email', $getInfo->email)->first();
        } else {
            $invitation = Invitation::where('token', $token)->where('workspace_id', $workspaceId)->first();
        }
        if (!$user) {
            // Tạo người dùng mới
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                // Có worksapce gửi qua link thì mới lấy
                'current_workspace' => ($workspaceId && $invitation->status != 0) ? $workspaceId : null,
            ]);
        }
        return $user;
    }
    public function createWorkspace(Request $request)
    {
        $workspaceName = $request->input('workspace_name');

        $workspace = Workspace::where('user_id', Auth::user()->id)->first();
        $workspace->workspace_name = $workspaceName;
        // Check xem có tên workspace đã tồn tại chưa. Nếu đã tồn tại thì thông báo lỗi.
        $workspaceExists = Workspace::where('workspace_name', $workspaceName)->exists();
        if ($workspaceExists) {
            return redirect()->back()->with('error', 'Tên workspace đã tồn tại!');
        } else {
            $workspace->save();
        }
        // Khi mà tạo tên worksapce cho chính bản thân thì thêm list danh sách
        UserWorkspaces::updateOrCreate([
            'workspace_id' => $workspace->id,
            'user_id' => Auth::user()->id,
            'roleid' => 2,
        ]);

        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();
        $user->update([
            'origin_workspace' => $workspace->id,
            'current_workspace' => $workspace->id,
        ]);

        $token = Str::random(32);
        Invitation::create([
            'workspace_id' => $workspace->id,
            'token' => $token,
        ]);
        return redirect()->route('welcome', $workspaceName)->with('success', 'Workspace đã được tạo thành công!');
    }
}
