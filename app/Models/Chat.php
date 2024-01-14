<?php

namespace App\Models;

use App\Models\Message;
use App\Helpers\Encryption;
use App\Models\Chat\ChatRoom;
use App\Models\ListContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Messages()
    {
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }

    public function lastMessage()
    {
        return $this->belongsTo(Message::class, 'id', 'chat_id')->latest();
    }

    public function sender()
    {
        return $this->belongsTo(ListContact::class, 'sender_id', 'id_user');
    }

    public function receiver()
    {
        return $this->belongsTo(ListContact::class, 'receiver_id', 'id_user');
    }

    public function unreadMessagesCount($chat_id)
    {
        return Message::where([
            'chat_id' => $chat_id
        ])->whereNull('read_at')->count();
    }

    public function EncrytionsChatId($chat_id)
    {
        return Encryption::encryptId($chat_id);
    }

    public function ChatRooms()
    {
        $this->belongsTo(ChatRoom::class, 'chat_room', 'id');
    }
}
