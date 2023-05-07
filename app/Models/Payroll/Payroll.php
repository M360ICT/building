<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public static function getEmployeeExpense($payroll_id,$expense_purpose_name)
    {
        $employee = Payroll::where('id', $payroll_id)->get();
        return $employee[0]->employee_name;
    }
}
