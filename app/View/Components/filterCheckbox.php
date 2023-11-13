<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class filterCheckbox extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $title;
    public $dataa;
    public $namedisplay;
    public function __construct($dataa = null, $name = null, $title = null, $namedisplay = null)
    {
        $this->dataa = $dataa;
        $this->name = $name;
        $this->title = $title;
        $this->namedisplay = $namedisplay;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-checkbox');
    }
}
