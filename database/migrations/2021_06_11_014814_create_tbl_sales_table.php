<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sales', function (Blueprint $table) {
            $table->increments('sales_id');
            $table->integer('user_id')->unsigned();
            $table->integer('sucursals_id')->unsigned();
            $table->integer('customers_id')->unsigned();
            $table->string('sales_payment_method')->nullable();
            $table->date('sales_entrega_date')->nullable();
            $table->date('sales_despacho_date')->nullable();
            $table->date('sales_canceled_date')->nullable();
            $table->string('sales_canceled_reason')->nullable();
            $table->date('sales_payment_date')->nullable();
            $table->integer('sales_status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sucursals_id')->references('sucursals_id')->on('mae_sucursals');
            $table->foreign('customers_id')->references('customers_id')->on('tbl_customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sales');
    }
}
