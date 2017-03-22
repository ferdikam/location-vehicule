<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Location extends Model
{
    use SoftDeletes,LogsActivity;
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

    public function verifDate($date_start, $date_end)
    {
        return Carbon::now()->between($date_start, $date_end);
    }
}
