<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Profile extends Model
{
	use SoftDeletes,LogsActivity;
    protected $fillable = [
        'user_id', 'avatar', 'phone1', 'phone2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
