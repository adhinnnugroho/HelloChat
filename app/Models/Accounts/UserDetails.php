<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserDetails extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Users()
    {
        return $this->belongsTo(User::class, 'id', 'id_user_details');
    }
}
