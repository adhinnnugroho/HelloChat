<?php

namespace App\View\Components\Chats;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BubbleChats extends Component
{
    public $sender_id, $user_login_id, $created_chat, $read_at_chat, $messages;
    /**
     * Create a new component instance.
     */
    public function __construct($sender_id = null, $created_chat = null, $read_at_chat = null, $messages = null)
    {
        $this->sender_id = $sender_id;
        $this->user_login_id = auth()->user()->id;
        $this->created_chat = $created_chat;
        $this->read_at_chat = $read_at_chat;
        $this->messages = $messages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chats.bubble-chats');
    }
}
