<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formsynthetic extends Component
{
    public $import;
    /**
     * Create a new component instance.
     */
    public function __construct($import = "abc")
    {
        $this->import = $import;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.formsynthetic');
    }
}
