<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table = "accounts";
    protected $primaryKey = 'id';

    public static function account($id)
    {
       $data = Accounts::where('id',$id)->select('account_name')->first();
       return $data;
    }
}
