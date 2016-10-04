<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_branch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id');
            $table->string('address');
            $table->string('phone');
            $table->string('contact_person');
            $table->string('contact_person_no');

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
        Schema::drop('bank_branch');
    }
}
