<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class rightClick extends Component
{
    public $workspacename;
    public $page;
    public $status;

    /**
     * Create a new component instance.
     *
     */
    public function __construct($workspacename, $page = "", $status = "")
    {
        $this->workspacename = $workspacename;
        $this->page = $page;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.right-click');
    }
}
