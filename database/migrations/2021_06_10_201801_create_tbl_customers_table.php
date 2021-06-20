<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customers', function (Blueprint $table) {
            $table->increments('customers_id');
            $table->string('customers_name')->nullable();
            $table->string('customers_mail')->nullable();
            $table->string('customers_phone')->nullable();
            $table->integer('addresses_id')->unsigned();
            $table->timestamps();

            $table->foreign('addresses_id')->references('addresses_id')->on('tbl_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customers');
    }
}
