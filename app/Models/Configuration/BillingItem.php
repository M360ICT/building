<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class BillingItem extends Model
{
    protected $table = "billing_items";
    protected $primaryKey = 'id';
}
