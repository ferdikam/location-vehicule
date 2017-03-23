<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UsersLoginToken extends Model
{
    const TOKEN_EXPIRY = 3600;
    protected $table = 'users_login_tokens';

    protected $fillable = ['user_id', 'token'];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function isExpired()
    {
        return $this->created_at->diffInSeconds(Carbon::now()) > self::TOKEN_EXPIRY;
    }

    public function belongsToId($id)
    {
        return (bool)($this->user->where('id', $id)->count() === 1);
    }

    public function scopeUserToken($query, $id, $token)
    {
        return $query->where('id',$id)
                     ->where('token', $token)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
