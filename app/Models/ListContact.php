<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListContact extends Model
{
    use HasFactory;
    protected $table = 'list_contact_users';
    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
