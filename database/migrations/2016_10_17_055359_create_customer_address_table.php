<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('zone_id')->unsigned();
            $table->integer('district_id')->unsigned();
            $table->string('vdc_municipality');
            $table->string('ward');
            $table->string('houseno');
            $table->string('tole');
            $table->string('tel');

            $table->integer('tzone_id')->unsigned();
            $table->integer('tdistrict_id')->unsigned();
            $table->string('tvdc_municipality');
            $table->string('tward');
            $table->string('thouseno');
            $table->string('ttole');
            $table->string('ttel');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zone')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
            $table->foreign('tzone_id')->references('id')->on('zone')->onDelete('cascade');
            $table->foreign('tdistrict_id')->references('id')->on('district')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_address');
    }
}
