<?php

namespace App\Livewire\Chats;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;
use App\Helpers\Encryption;
use App\Models\Accounts\UserDetails;
use App\Models\Chat\ChatRoom;
use Illuminate\Support\Facades\Auth;

class ListChat extends Component
{
    public $ListUserChat, $search_chat, $UserLogin;
    public $getSessionUserLogin;
    public $listeners = [
        'sendnewmessage' => 'refreshChat',
        'RefreshChat' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.chats.list-chat');
    }


    public function mount()
    {
        $UserLogin = Auth::user();
        $this->getSessionUserLogin = $UserLogin;

        $this->ListUserChat = ChatRoom::where(function ($ListChatUserQuery) use ($UserLogin) {
            $ListChatUserQuery->where('this_users', $UserLogin->id)->orWhere('with_users', $UserLogin->id);
        })->whereHas('chats')->get();


        $this->UserLogin = UserDetails::where(['id' => $UserLogin->id])->first();
    }

    public function refreshChat()
    {
        $this->ListUserChat = ChatRoom::where(function ($ListChatUserQuery) {
            $ListChatUserQuery->where('this_users', $this->getSessionUserLogin->id)->orWhere('with_users', $this->getSessionUserLogin->id);
        })->get();
    }


    public function readMessage($contact_id)
    {
        $code = Encryption::decryptId($contact_id);
        if (Chat::where('id', $code)->exists()) {
            Message::where('chat_id', $code)
                ->whereNull('read_at')
                ->update(['read_at' => now()]);
        }
        $this->dispatch('RefreshChat');
        $this->dispatch('HandleChat::SetSelectedContact', $contact_id);
    }

    public function updatedSearchChat()
    {
        $this->ListUserChat = ChatRoom::where(function ($ListChatUserQuery) {
            $ListChatUserQuery->where('this_users', $this->getSessionUserLogin->id)->orWhere('with_users', $this->getSessionUserLogin->id);
        })->whereHas('chats')->get();
    }
}
