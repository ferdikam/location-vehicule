<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
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
