<?php

namespace App\Models\Configuration\Building;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = "buildings";
    protected $primaryKey = "id";
    protected $guarded = []; 
}
