<?php

namespace App\View\Components;

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

    public function __construct($title = 'Ringnet', $activeName = 'activeName', $activeGroup = 'activeGroup', $workspacename = 'dhkas')
    {
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
    public function isActiveRouteGroup($routeGroup)
    {
        $currentRoute = Route::currentRouteName();
        $routes = is_array($routeGroup) ? $routeGroup : explode(',', $routeGroup);

        if (in_array($currentRoute, $routes)) {
            return 'active';
        }

        return '';
    }
}
