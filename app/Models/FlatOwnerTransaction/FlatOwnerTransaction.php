<?php

namespace App\Models\FlatOwnerTransaction;

use Illuminate\Database\Eloquent\Model;

class FlatOwnerTransaction extends Model
{
    protected $table = "flat_owner_transactions";
    protected $primaryKey = "id";
    protected $guarded = [];
//    protected $fillable = ['client_transaction_type'];
}