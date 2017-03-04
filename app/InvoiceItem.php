<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id', 'name', 'price'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
