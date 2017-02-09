<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fournisseur extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
