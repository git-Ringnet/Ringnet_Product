<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateFormModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $title;
    public $idModal;

    public function __construct($name = null, $title = null, $idModal = null)
    {
        $this->idModal = $idModal;
        $this->name = $name;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.date-form-modal');
    }
}
