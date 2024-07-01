<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class viewMini extends Component
{
    public $listDetail;
    public $workspacename;
    public $page;

    /**
     * Create a new component instance.
     *
     * @param array $listDetail
     * @param string $workspacename
     */
    public function __construct($listDetail, $workspacename, $page = "")
    {
        $this->listDetail = $listDetail;
        $this->workspacename = $workspacename;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.view-mini');
    }
}
