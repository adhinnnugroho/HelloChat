<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavbarBack extends Component
{
    public $title, $actions, $icons;


    /**
     * Create a new component instance.
     */
    public function __construct($title, $actions = null, $icons)
    {
        $this->title = $title;
        $this->actions = $actions;
        $this->icons = $icons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.navbar-back');
    }
}
