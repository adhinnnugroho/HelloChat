<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;
use App\Helpers\Encryption;
use App\Models\Chat\ChatRoom;
use Illuminate\Support\Facades\Auth;

class ListChat extends Component
{
    public $user, $search_chat, $user_login;
    public $listeners = [
        'sendnewmessage' => 'refreshChat',
    ];

    public function render()
    {
        return view('livewire.chat.list-chat');
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

    public function refreshChat($chat_room)
    {
        $data_userLogin = Auth::user();
        $this->user = ChatRoom::where([
            'this_users' => $data_userLogin->id
        ])->orWhere([
            'with_users' => $data_userLogin->id
        ])->get();
    }


    public function readMessage($contact_id)
    {
        $data_userLogin = Auth::user();
        $this->user_login = $data_userLogin;
        $code = Encryption::decryptId($contact_id);
        Message::where([
            'chat_id' => $code,
        ])->update([
            'read_at' => date('Y-m-d, H:i:s'),
        ]);
        $this->user = ChatRoom::where([
            'this_users' => $data_userLogin->id
        ])->orWhere([
            'with_users' => $data_userLogin->id
        ])->get();
    }

    public function updatedSearchChat()
    {
        $data_userLogin = Auth::user();

        $searchTerm = $this->search_chat;
        $this->user = Chat::where(function ($query) use ($data_userLogin) {
            $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
        })
            ->orWhere(function ($query) use ($data_userLogin) {
                $query->where('receiver_id', $data_userLogin->id)->orWhere('sender_id', $data_userLogin->id);
            })->where(function ($query) use ($searchTerm) {
                $query->whereHas('receiver.user', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%$searchTerm%");
                })->orWhereHas('sender.user', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%$searchTerm%");
                });
            })
            ->orderBy('chats.created_at', 'desc')
            ->get();
    }
}
