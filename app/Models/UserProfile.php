<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_pic',
        'address',
        'usdt_address',
        'etherium_address',
        'bitcoin_address',
    ];


    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
