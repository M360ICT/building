<?php

namespace App\Models\Supplier;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   public static function supplier($id)
   {
        $supplier = Supplier::where('supplier_id',$id)->select('suuplier_name')->first();
        return $supplier;
   }
}
