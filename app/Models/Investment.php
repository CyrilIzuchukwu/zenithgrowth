<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relationship with Plan
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }



}
