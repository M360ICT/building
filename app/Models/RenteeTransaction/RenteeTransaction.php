<?php

namespace App\Models\RenteeTransaction;

use Illuminate\Database\Eloquent\Model;

class RenteeTransaction extends Model
{
    protected $table = "rentee_transactions";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
