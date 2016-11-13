<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankContactPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_contact_person', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('designation');
            $table->string('email');
            $table->string('contact');
            $table->integer('bank_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('branch_id')->references('id')->on('bank_branch')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_contact_person');
    }
}
