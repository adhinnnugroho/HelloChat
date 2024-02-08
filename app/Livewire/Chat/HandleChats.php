<?php

namespace App\Livewire\Chat;

use App\Models\Chat\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HandleChats extends Component
{
    public $user;
    public $selected_contact, $count_message_not_read;
    public $chatvalue = null;
    public $listeners = [
        'refreshNavbar' => '$refresh',
        'startedChat'   => 'handlechats'
    ];

    public function render()
    {
        return view('livewire.chat.handle-chats');
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

    public function handlechats($selected_contact)
    {

        dd($selected_contact);
        $this->user = ChatRoom::where([
            'this_users' => $selected_contact
        ])->orWhere([
            'with_users' => $selected_contact
        ])->get();
    }
}
