<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_discounts', function (Blueprint $table) {
            $table->increments('discounts_id');
            $table->integer('discounts_porcentaje')->nullable();
            $table->date('discounts_start_date')->nullable();
            $table->date('discounts_end_date')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('discounts_stock_max')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_discounts');
    }
}
