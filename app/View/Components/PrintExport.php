<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrintExport extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $header;
    public $body;
    public $footer;
    public $type;

    public function __construct($title, $header = null, $body = null, $footer = null, $type = null)
    {
        $this->title = $title;
        $this->header = $header;
        $this->body = $body;
        $this->footer = $footer;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.print-export');
    }
}
