<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $fillable = [
        'name', 'marque_id'
    ];

    /**
     * Un modèle appartient à une seule marque de véhicule
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }
}
