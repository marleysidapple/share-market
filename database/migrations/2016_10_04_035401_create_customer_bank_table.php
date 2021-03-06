<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('bank_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->string('accountno');
            $table->string('accountname');

            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('bank')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('bank_branch')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_bank');
    }
}
