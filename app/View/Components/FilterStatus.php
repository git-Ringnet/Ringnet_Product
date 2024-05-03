<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterStatus extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $title;
    public $button;
    public $key1;
    public $key2;
    public $key3;
    public $key4;
    public $key5;
    public $value1;
    public $value2;
    public $value3;
    public $value4;
    public $value5;
    public $color1;
    public $color2;
    public $color3;
    public $color4;
    public $color5;
    public function __construct(
        $name = null,
        $title = null,
        $button = null,
        $key1 = null,
        $key2 = null,
        $key3 = null,
        $key4 = null,
        $key5 = null,
        $value1 = null,
        $value2 = null,
        $value3 = null,
        $value4 = null,
        $value5 = null,
        $color1 = null,
        $color2 = null,
        $color3 = null,
        $color4 = null,
        $color5 = null
    ) {
        $this->name = $name;
        $this->key1 = $key1;
        $this->key2 = $key2;
        $this->key3 = $key3;
        $this->key4 = $key4;
        $this->key5 = $key5;
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->value3 = $value3;
        $this->value4 = $value4;
        $this->value5 = $value5;
        $this->color1 = $color1;
        $this->color2 = $color2;
        $this->color3 = $color3;
        $this->color4 = $color4;
        $this->color5 = $color5;
        $this->title = $title;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-status');
    }
}
