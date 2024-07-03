<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrintComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $contentId;
    public $additionalContent;

    public function __construct($contentId, $additionalContent = null)
    {
        $this->contentId = $contentId;
        $this->additionalContent = $additionalContent;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.print-component');
    }
}
