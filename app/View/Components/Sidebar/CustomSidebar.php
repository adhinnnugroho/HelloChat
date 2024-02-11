<?php

namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomSidebar extends Component
{

    public $positions, $actions;
    /**
     * Create a new component instance.
     */
    public function __construct($positions = null, $actions = null)
    {
        $this->positions = $positions;
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar.custom-sidebar');
    }
}
