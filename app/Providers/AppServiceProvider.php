<?php

namespace App\Providers;

use App\Models\UserWorkspaces;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // No need to register anything here for this case.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        // Use View Composer to make global_variable available to all views
        View::composer('*', function ($view) {
            // Fetch workspace names for the authenticated user
            $globalVariable = $this->getWorkspaceNames();
            $view->with('global_variable', $globalVariable);
        });

        // Set up pagination using Bootstrap
        Paginator::useBootstrap();
    }

    /**
     * Fetch workspace names for the authenticated user.
     *
     * @return array
     */
    protected function getWorkspaceNames(): array
    {
        // Check if user is authenticated
        // dakhljuskdhsa
        if (Auth::check()) {
            $user_id = Auth::id();
            $allWorkSpace = UserWorkspaces::with('workspace')->where('user_id', $user_id)->get();
            $workspaceNames = [];

            foreach ($allWorkSpace as $workspace) {
                $workspaceNames[] = [
                    'id' => $workspace->workspace->id,
                    'workspace_name' => $workspace->workspace->workspace_name
                ];
            }

            return $workspaceNames;
        }

        // Return empty array if user is not authenticated
        return [];
    }
}
