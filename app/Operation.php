<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'vehicule_id', 'name', 'date', 'montant', 'date_next', 'fournisseur'
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
}
