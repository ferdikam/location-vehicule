<?php

namespace App;

use Illuminate\Cache\TaggableStore;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_user');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function token()
    {
        return $this->hasOne(UsersLoginToken::class);
    }

    public function storeToken()
    {
        $this->token()->delete();
        $this->token()->create([
            'token' => bin2hex(random_bytes(8)),
        ]);
    }

    public function cachedRoles()
    {
        $userPrimaryKey = $this->primaryKey;
        $cacheKey = 'entrust_roles_for_user_'.$this->$userPrimaryKey;
        if(Cache::getStore() instanceof TaggableStore) {
            return Cache::tags('role_user')->remember($cacheKey, Config::get('cache.ttl'), function () {
                return $this->roles()->get();
            });
        } else {
            return $this->roles()->get();
        }
    }

    public function save(array $options = [])
    {   //both inserts and updates
        if(Cache::getStore() instanceof TaggableStore) {
            Cache::tags('role_user')->flush();
        }
        return parent::save($options);
    }
    public function delete(array $options = [])
    {   //soft or hard
        if(Cache::getStore() instanceof TaggableStore) {
            Cache::tags('role_user')->flush();
        }
        return parent::delete($options);;
    }
    public function restore()
    {   //soft delete undo's
        if(Cache::getStore() instanceof TaggableStore) {
            Cache::tags('role_user')->flush();
        }
        return parent::restore();;
    }

}
