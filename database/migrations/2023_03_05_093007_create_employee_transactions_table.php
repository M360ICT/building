<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_type')->nullable();
            $table->bigInteger('transaction_account_id')->nullable();
            $table->bigInteger('transaction_employee_id')->nullable();
            $table->string('transaction_amount')->nullable();
            $table->string('transaction_last_balance')->nullable();
            $table->string('transaction_opening_balance')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('transaction_note')->nullable();
            $table->string('transaction_create_date')->nullable();
            $table->string('transaction_has_deleted')->default('NO');
            $table->string('transaction_deleted_by')->nullable();
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
        Schema::dropIfExists('employee_transactions');
    }
}
