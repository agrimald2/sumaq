<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inventories', function (Blueprint $table) {
            $table->increments('inventories_id');
            $table->integer('products_id')->unsigned();
            $table->integer('sucursals_id')->unsigned();
            $table->string('inventories_image_url')->nullable();
            $table->string('inventories_codigo')->nullable();
            $table->integer('sales_id')->unsigned();
            $table->integer('purchase_orders_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('products_id')->references('products_id')->on('tbl_products');
            $table->foreign('sucursals_id')->references('sucursals_id')->on('mae_sucursals');
            $table->foreign('sales_id')->references('sales_id')->on('tbl_sales');
            $table->foreign('purchase_orders_id')->references('purchase_orders_id')->on('tbl_purchase_orders');
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
        Schema::dropIfExists('tbl_inventories');
    }
}
