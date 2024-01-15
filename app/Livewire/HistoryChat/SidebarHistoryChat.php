<?php

namespace App\Livewire\HistoryChat;

use App\Models\User;
use Livewire\Component;
use App\Models\Chat\ChatRoom;

class SidebarHistoryChat extends Component
{
    public $selectedContactId, $selectedContact;
    public function render()
    {
        return view('livewire.history-chat.sidebar-history-chat');
    }

    public function mount(){
        $this->selectedContact = ChatRoom::where(['uuid_list_contact' => $this->selectedContactId])->first();

    }


}
