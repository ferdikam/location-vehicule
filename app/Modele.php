<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modele extends Model
{
    use SoftDeletes;
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
