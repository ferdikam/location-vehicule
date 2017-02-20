<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'avatar', 'phone1', 'phone2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
