<?php

namespace App\View\Components\Chats;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChatView extends Component
{
    public $image, $unreadMessagesCount, $name;
    /**
     * Create a new component instance.
     */
    public function __construct($image, $unreadMessagesCount, $name)
    {
        $this->image = $image;
        $this->unreadMessagesCount = $unreadMessagesCount;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chats.chat-view');
    }
}
