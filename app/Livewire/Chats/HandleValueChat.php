<?php

namespace App\Livewire\Chats;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HandleValueChat extends Component
{
    public $chat;
    public $user_login, $selectedContactId;

    public $listeners = [
        'sendnewmessage' => 'refreshChat',
        'savedChat' => 'savedChat',
    ];

    public function render()
    {
        return view('livewire.chats.handle-value-chat');
    }

    public function refreshChat($chat_room)
    {
        $this->chat = Chat::where([
            'chat_room' => $chat_room
        ])->get();
    }

    public function mount()
    {
        $this->user_login = Auth::user();
        $this->chat = Chat::where([
            'chat_room' => $this->chat
        ])->get();
    }
}
