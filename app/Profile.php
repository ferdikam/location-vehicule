<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'user_id', 'avatar', 'phone1', 'phone2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
