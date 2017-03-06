<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Marque extends Model
{
	use SoftDeletes,LogsActivity;
    protected $fillable = ['name'];

    /**
     * Une marque possède plusieurs modeles.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modeles()
    {
        return $this->hasMany(Modele::class);
    }
}
