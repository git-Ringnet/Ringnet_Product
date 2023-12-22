<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
        auth()->login($user);
        return redirect()->route('dashboard');
    }


    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
            ]);
            $userId = $user->id;
            $user->update([
                'origin_workspace' => $userId,
                'current_workspace' => $userId
            ]);
        }
        return $user;
    }
    public function createWorkspace(Request $request)
    {
        $workspaceName = $request->input('workspace_name');

        $workspace = Workspace::where('user_id', Auth::user()->id)->first();
        $workspace->workspace_name = $workspaceName;
        $workspace->save();

        return redirect()->route('dashboard')->with('success', 'Workspace đã được tạo thành công!');
    }
}
