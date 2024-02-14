<?php

namespace App\View\Components\Chats;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BubbleChats extends Component
{
    public $color, $positions;
    /**
     * Create a new component instance.
     */
    public function __construct($color = 'green-800', $positions = 'end')
    {
        $this->color = $color;
        $this->positions = $positions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chats.bubble-chats');
    }
}
