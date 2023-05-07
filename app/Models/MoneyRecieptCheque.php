<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyRecieptCheque extends Model
{
    protected $table = "money_reciept_cheques";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
