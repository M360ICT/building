<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $table = "flats";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
