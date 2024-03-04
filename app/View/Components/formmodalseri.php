<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formmodalseri extends Component
{
    public $product;
    public $receive;
    /**
     * Create a new component instance.
     */
    public function __construct($product = "", $receive ="")
    {
        $this->product = $product;
        $this->receive = $receive;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.formmodalseri');
    }
}
