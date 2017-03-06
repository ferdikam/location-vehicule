<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Modele extends Model
{
    use SoftDeletes,LogsActivity;
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
