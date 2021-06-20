<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sales_details', function (Blueprint $table) {
            $table->increments('sales_details_id');
            $table->integer('sales_id')->unsigned();
            $table->integer('customers_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->integer('office_id')->nullable();
            $table->timestamps();

            $table->foreign('sales_id')->references('sales_id')->on('tbl_sales');
            $table->foreign('customers_id')->references('customers_id')->on('tbl_customers');
            $table->foreign('products_id')->references('products_id')->on('tbl_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sales_details');
    }
}
