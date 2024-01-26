<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formModalImport extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $name;
    public $idModal;

    public function __construct($title = null, $name = null, $idModal = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->idModal = $idModal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-modal-import');
    }
}
