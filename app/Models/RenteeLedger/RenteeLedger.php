<?php

namespace App\Models\RenteeLedger;

use Illuminate\Database\Eloquent\Model;

class RenteeLedger extends Model
{
    protected $table = "rentee_ledger";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
