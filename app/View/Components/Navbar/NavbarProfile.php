<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavbarProfile extends Component
{
    public $image, $name, $actions;

    /**
     * Create a new component instance.
     */
    public function __construct($image, $name, $actions = null)
    {
        $this->image = $image;
        $this->name = $name;
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.navbar-profile');
    }
}
