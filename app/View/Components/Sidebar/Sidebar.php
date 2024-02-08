<?php

namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $show, $code;
    /**
     * Create a new component instance.
     */
    public function __construct($show, $code = null)
    {
        $this->show = $show;
        $this->code = $code;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar.sidebar');
    }
}
