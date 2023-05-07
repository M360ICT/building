<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class AccountTransfer extends Model
{
 protected $table = "account_transfer";
    protected $primaryKey = "account_transfer_id";
    protected $guarded = []; 
}
