<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Model;

class InvoiceBilling extends Model
{
    protected $table = "invoice_billing_items";
    protected $primaryKey = "id";
    protected $guarded = [];
}
