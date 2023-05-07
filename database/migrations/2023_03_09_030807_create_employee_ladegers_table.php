<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLadegersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_ladegers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->nullable();
            $table->bigInteger('employee_account_id')->nullable();
            $table->bigInteger('employee_transaction_id')->nullable();
            $table->string('employee_ledger_type')->nullable();
            $table->bigInteger('employee_ledger_invoice_id')->nullable();
            $table->bigInteger('employee_ledger_money_receipt_id')->nullable();
            $table->bigInteger('employee_ledger_refund_id')->nullable();
            $table->string('employee_ledger_status')->nullable();
            $table->bigInteger('employee_ledger_last_balance')->nullable();
            $table->bigInteger('employee_ledger_dr')->nullable();
            $table->bigInteger('employee_ledger_cr')->nullable();
            $table->string('employee_ledger_date')->nullable();
            $table->string('employee_ledger_create_date')->nullable();
            $table->string('employee_ledger_prepared_by')->nullable();
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
        Schema::dropIfExists('employee_ladegers');
    }
}
