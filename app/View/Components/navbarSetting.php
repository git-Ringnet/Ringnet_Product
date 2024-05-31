<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbarSetting extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $activeName;
    public $activeGroup;
    public $workspacename;
    public function __construct($title = 'Ringnet', $activeName = 'activeName', $activeGroup = 'activeGroup', $workspacename = 'workspacename')
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
        return view('components.navbar-setting');
    }
}
