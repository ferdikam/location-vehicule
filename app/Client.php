<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = [
        'name', 'phone1', 'phone2', 'address', 'num_cni', 'file_cni'
    ];

    protected static $logAttributes = ['name'];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
