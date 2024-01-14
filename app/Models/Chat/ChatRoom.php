<?php

namespace App\Models\Chat;

use App\Helpers\Encryption;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChatRoom extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function chats()
    {
        return $this->belongsTo(Chat::class, 'id', 'chat_room');
    }

    public function getAvatar()
    {
        $data_userLogin = Auth::user();
        $this_users = Self::where([
            'this_users' => $data_userLogin->id
        ])->first();

        $with_users = Self::where([
            'with_users' => $data_userLogin->id
        ])->first();

        $role = $this_users->with_users ?? $with_users->this_users;

        $role_users = $this->getRoleUsers($role);
        return $role_users;
    }

    public function getName()
    {
        $data_userLogin = Auth::user();
        $this_users = Self::where([
            'this_users' => $data_userLogin->id
        ])->first();

        $with_users = Self::where([
            'with_users' => $data_userLogin->id
        ])->first();

        $role = $this_users->with_users ?? $with_users->this_users;

        $role_users = $this->getNameUsers($role);
        return $role_users;
    }

    private static function getNameUsers($code)
    {
        $data_user = User::where([
            'id' => $code
        ])->first();

        return $data_user->name;
    }

    private static function getRoleUsers($code)
    {
        $data_user = User::where([
            'id' => $code
        ])->first();

        if (stripos($data_user->UserDetails->avatar, 'images/') !== false) {
            $filelocations = asset('/storage/' . $data_user->UserDetails->avatar);
        } else {
            $filelocations = $data_user->UserDetails->avatar;
        }

        return $filelocations;
    }

    public static function checkingAddnewChatRoom($selectedContact)
    {
        $data_userLogin = Auth::user();

        $checking_data = Self::where(function ($query) use ($data_userLogin) {
            $query->where('this_users', $data_userLogin->id)->orWhere('with_users', $data_userLogin->id);
        })->where(function ($query) use ($selectedContact) {
            $query->where('this_users', $selectedContact)->orWhere('with_users', $selectedContact);
        })->first();

        return $checking_data;
    }

    public  function EncrytionsChatId($chat_id)
    {
        return Encryption::encryptId($chat_id);
    }
}
