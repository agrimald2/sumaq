<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->increments('purchase_order_details_id');
            $table->integer('purchase_orders_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->integer('total_products')->nullable();
            $table->float('total_price')->nullable();
            $table->float('net_price')->nullable();
            $table->timestamps();

            $table->foreign('purchase_orders_id')->references('purchase_orders_id')->on('tbl_purchase_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_details');
    }
}
