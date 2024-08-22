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
    public $status;
    public $guest;
    public $listUser;

    /**
     * Create a new component instance.
     *
     * @param array $listDetail
     * @param string $workspacename
     */
    public function __construct($listDetail, $workspacename, $page = "", $status = "", $guest = "", $listUser = "")
    {
        $this->listDetail = $listDetail;
        $this->workspacename = $workspacename;
        $this->page = $page;
        $this->status = $status;
        $this->guest = $guest;
        $this->listUser = $listUser;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.view-mini');
    }
}
