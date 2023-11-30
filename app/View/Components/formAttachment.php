<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formAttachment extends Component
{
    public $value;
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($value = null, $name = null)
    {
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-attachment', [
            'value' => $this->value,
            'name' => $this->name
        ]);
    }
}
