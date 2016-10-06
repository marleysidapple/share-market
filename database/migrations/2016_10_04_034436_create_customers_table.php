<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('gender');
            $table->string('dateofbirth');
            $table->string('fathername');
            $table->string('mothername');
            $table->string('gfathername');
            $table->string('gmothername');
            $table->string('permanentaddress');
            $table->string('temporaryaddress');
            $table->string('phone');
            $table->string('mobile');
            $table->string('country');
            $table->string('citizenshipno');
            $table->string('maritalstatus');
            $table->string('occupation');
            $table->tinyInteger('ismultiple');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::drop('customers');
    }
}
