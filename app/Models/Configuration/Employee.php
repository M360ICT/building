<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $primaryKey = "id";
    protected $guarded = [];




   public static function getEmployeeName($employee_id)
    {
        $employee = Employee::where('id', $employee_id)->get();
        return $employee[0]->employee_name;
    }





   public static function getEmployeeNumber($employee_id)
    {
        $employee = Employee::where('id', $employee_id)->get();
        return $employee[0]->employee_phone;
    }

}
