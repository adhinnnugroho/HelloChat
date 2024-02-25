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
    public $listeners = [
        'refreshNavbar' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.chats.list-user-connection');
    }

    public function mount()
    {
        $data_userLogin = Auth::user();
        $this->user = ChatRoom::where([
            'this_users' => $data_userLogin->id
        ])->orWhere([
            'with_users' => $data_userLogin->id
        ])->get();
    }

    public function setNewUser()
    {
        $data_userLogin = Auth::user();
        $this->user = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('receiver_id', $data_userLogin->id)
                ->orWhere('sender_id', $data_userLogin->id);
        })->orWhere(function ($query) use ($data_userLogin) {
            $query->where('receiver_id', $data_userLogin->id)
                ->orWhere('sender_id', $data_userLogin->id);
        })->orderBy('chats.created_at', 'desc')->get();
    }
}
