<?php

namespace App\Livewire\Chats;

use App\Models\Chat;
use App\Models\User;
use App\Models\Account;
use App\Models\Chat\ChatRoom;
use App\Models\Message;
use Livewire\Component;
use App\Models\ListContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class HistoryChat extends Component
{
    public $listeners = [
        'savedChat' => 'savedChat',
        'savedAudio' => 'saveAudio',
        'refresh::historyChat' => '$refresh',
        'HandleChat::SetSelectedContact' => 'mount'
    ];

    public $account_data;
    public $selectedContactId;
    public $chatvalue;
    public $history_chat;

    public function render()
    {
        return view('livewire.chats.history-chat');
    }

    public function mount()
    {
        $this->account_data = User::where(['id' => $this->selectedContactId])->first();
        $this->chatvalue = null;
        $this->history_chat = Chat::where([
            'chat_room' => $this->selectedContactId
        ])->first();
    }

    public function savedChat()
    {
        $data_userLogin = Auth::user();

        $chat_room = ChatRoom::find($this->selectedContactId);
        $with_user = ($chat_room->this_users == $data_userLogin->id) ? $chat_room->with_users : $chat_room->this_users;

        $chat = Chat::create([
            'sender_id' => $data_userLogin->id,
            'receiver_id' => $with_user,
            'chat_room'   => $this->selectedContactId
        ]);

        Message::create([
            'chat_id' => $chat->id,
            'boddy_message' => $this->chatvalue,
            'chat_room'   => $chat_room->id
        ]);

        $this->chatvalue = null;
        $this->RefreshChat($data_userLogin);
        $this->dispatch('sendnewmessage', $chat_room->id);
    }

    public function saveAudio($audio)
    {
        dd($audio);
        // Mengambil blob audio dari FormData
        $audioPath = 'images/user-profile/audio.wav';
        $audioUrl = URL::to($audioPath); // Mengambil URL dari file yang disimpan

        // Misalnya, menyimpan file menggunakan file_put_contents
        file_put_contents($audioPath, file_get_contents($audio['audio']));
        $audioString = $audioPath;
        // $audioString = $audio;
        $data_userLogin = Auth::user();
        $chat_room = ChatRoom::where([
            'id' => $this->selectedContactId
        ])->first();


        if ($chat_room->this_users == $data_userLogin->id) {
            $with_user = $chat_room->with_users;
        } else {
            $with_user = $chat_room->this_users;
        }

        $chat_id = Chat::create([
            'sender_id' => $data_userLogin->id,
            'receiver_id' => $with_user,
            'chat_room'   => $this->selectedContactId
        ]);

        Message::create([
            'chat_id' => $chat_id->id,
            'boddy_message' => $audioString,
            'chat_room'   => $chat_room->id,
            'type_messages' => 'voice'
        ]);

        $this->chatvalue = null;
        $this->RefreshChat($data_userLogin);
        $this->dispatch('sendnewmessage', $chat_room->id);
    }

    private function RefreshChat($data_userLogin)
    {
        $selectedContactId = $this->selectedContactId;
        $data_userLogin = Auth::user();

        $this->history_chat = Chat::where(function ($query) use ($data_userLogin, $selectedContactId) {
            $query->where('sender_id', $data_userLogin->id)
                ->orWhere('receiver_id', $data_userLogin->id)
                ->where('sender_id', $selectedContactId)
                ->orWhere('receiver_id', $selectedContactId);
        })->first();
    }
}
