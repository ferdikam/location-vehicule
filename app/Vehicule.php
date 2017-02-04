<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'modele_id', 'category_id', 'immatriculation', 'kilometrage', 'etat', 'puissance', 'poids_vide', 'places',
        'date_arrivee', 'transmission', 'carburant'
    ];

    protected $dates = ['date°arrivee'];

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setDateArriveeAttribute($date)
    {
        $this->attributes['date_arrivee']= Carbon::parse($date);
    }
    

}
