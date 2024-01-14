<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\User;
use App\Models\Account;
use App\Models\Chat\ChatRoom;
use App\Models\Message;
use Livewire\Component;
use App\Models\ListContact;
use Illuminate\Support\Facades\Auth;

class HistoryChat extends Component
{
    public $listeners = [
        'savedChat' => 'savedChat',
    ];

    public $account_data;
    public $selectedContactId;
    public $chatvalue;
    public $history_chat;

    public function render()
    {
        return view('livewire.chat.history-chat');
    }

    public function mount()
    {
        $this->account_data = User::where(['id' => $this->selectedContactId])->first();
        $this->chatvalue = null;
        $data_userLogin = Auth::user();
        $this->history_chat = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('sender_id', $data_userLogin->id)->orWhere('receiver_id', $data_userLogin->id);
        })->where(function ($query) {
            $query->where('sender_id', $this->selectedContactId)->orWhere('receiver_id', $this->selectedContactId);
        })->first();
    }

    public function savedChat()
    {
        $valueChat = $this->chatvalue;
        $data_userLogin = Auth::user();
        $chat_room = ChatRoom::where([
            'id' => $this->selectedContactId
        ])->first();




        $checking_chat = Chat::where([
            'sender_id' => $data_userLogin->id,
            'receiver_id' => $chat_room->with_users,
        ])->first();

        if (is_null($checking_chat)) {
            $chat_id = Chat::create([
                'sender_id' => $data_userLogin->id,
                'receiver_id' => $chat_room->with_users,
                'chat_room'   => $this->selectedContactId
            ]);
        } else {
            $chat_id = $checking_chat;
        }

        Message::create([
            'chat_id' => $chat_id->id,
            'boddy_message' => $valueChat,
        ]);

        $this->chatvalue = null;
        $this->history_chat = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('sender_id', $data_userLogin->id)->orWhere('receiver_id', $data_userLogin->id);
        })->where(function ($query) {
            $query->where('sender_id', $this->selectedContactId)->orWhere('receiver_id', $this->selectedContactId);
        })->first();

        $this->dispatch('sendnewmessage');
    }
}
