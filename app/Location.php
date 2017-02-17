<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'clieant_id', 'vehicule_id', 'date_start', 'date_end', 'tokens', 'status'
    ];

    public $dates = ['date_start', 'date_end'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'location_user');
    }
}
