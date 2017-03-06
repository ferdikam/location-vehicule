<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class InvoiceItem extends Model
{
	use SoftDeletes, LogsActivity;
    protected $fillable = [
        'invoice_id', 'name', 'price'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
