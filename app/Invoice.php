<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'client_id', 'invoice_no', 'title', 'invoice_date', 'sub_total', 'discount', 'total'
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
