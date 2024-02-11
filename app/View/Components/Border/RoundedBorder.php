<?php

namespace App\View\Components\Border;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoundedBorder extends Component
{
    public $color;
    /**
     * Create a new component instance.
     */
    public function __construct($color = 'green-700')
    {
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.border.rounded-border');
    }
}
