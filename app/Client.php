<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'phone1', 'phone2', 'address', 'num_cni', 'file_cni'
    ];
}
