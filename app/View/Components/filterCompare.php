<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class filterCompare extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $title;

    public function __construct($name = null, $title = null)
    {
        $this->name = $name;
        $this->title = $title;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-compare');
    }
}
