<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_expense_name')->nullable();
            $table->string('payroll_expense_slug')->nullable();
            $table->string('payroll_expense_has_deleted')->default("NO");
            $table->string('payroll_expense_status')->default("NO");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_expenses');
    }
}
