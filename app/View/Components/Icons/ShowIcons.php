<?php

namespace App\View\Components\Icons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowIcons extends Component
{
    public $icons, $positions, $actions, $color;
    /**
     * Create a new component instance.
     */
    public function __construct($icons, $positions = null, $actions = null, $color = null)
    {
        $this->icons = $icons;
        $this->positions = $positions;
        $this->actions = $actions;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icons.show-icons');
    }
}
