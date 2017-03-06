<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Vehicule extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = [
        'modele_id', 'category_id', 'immatriculation', 'kilometrage', 'etat', 'puissance', 'poids_vide', 'places',
        'date_arrivee', 'transmission', 'carburant'
    ];

    protected $dates = ['date°arrivee','deleted_at'];

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function setDateArriveeAttribute($date)
    {
        $this->attributes['date_arrivee']= Carbon::parse($date);
    }
    

}
