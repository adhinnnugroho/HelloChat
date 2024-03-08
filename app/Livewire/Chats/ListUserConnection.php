<?php

namespace App\Livewire\Chats;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Encryption;
use App\Models\ListContact;
use App\Models\Chat\ChatRoom;
use Illuminate\Support\Facades\Auth;

class ListUserConnection extends Component
{
    public $user;
    public $selected_contact, $count_message_not_read;
    public $UserLogin;
    public $listeners = [
        'refreshNavbar' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.chats.list-user-connection');
    }

    public function mount()
    {
        $this->UserLogin = Auth::user();
        $this->user = ChatRoom::where(function ($ListChatUserQuery) {
            $ListChatUserQuery->where('this_users', $this->UserLogin->id)->orWhere('with_users', $this->UserLogin->id);
        })->get();
    }
}
