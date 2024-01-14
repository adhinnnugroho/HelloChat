<?php

namespace App\Models;

use App\Helpers\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListContact extends Model
{
    use HasFactory;
    protected $table = 'list_contact_users';
    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'contact_user_id', 'id');
    }

    public  function EncrytionsId($chat_id)
    {
        return Encryption::encryptId($chat_id);
    }
}
