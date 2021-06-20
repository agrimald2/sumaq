<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_addresses', function (Blueprint $table) {
            $table->increments('addresses_id');
            $table->string('addresses_first_line')->nullable();
            $table->string('addresses_second_line')->nullable();
            $table->string('addresses_reference')->nullable();
            $table->integer('districts_id')->unsigned();
            $table->timestamps();

            $table->foreign('districts_id')->references('districts_id')->on('tbl_districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_addresses');
    }
}
