<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Fournisseur extends Model
{
    use SoftDeletes,LogsActivity;

    protected $fillable = ['name'];

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
