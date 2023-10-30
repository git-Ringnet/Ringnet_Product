<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;

    public function __construct($title = 'Ringnet')
    {
        $this->title = $title;
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
