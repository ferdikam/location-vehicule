<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Operation extends Model
{
    use SoftDeletes;

    protected $dates= ['date', 'date_next'];

    protected $fillable = [
        'vehicule_id', 'date', 'montant', 'date_next', 'fournisseur_id', 'type_operation_id', 'validated'
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function typeOperation()
    {
        return $this->belongsTo(TypeOperation::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date);
    }

    
}
