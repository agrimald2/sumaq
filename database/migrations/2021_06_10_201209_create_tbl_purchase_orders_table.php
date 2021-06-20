<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_purchase_orders', function (Blueprint $table) {
            $table->increments('purchase_orders_id');
            $table->integer('purchase_orders_solicited_by')->nullable();
            $table->date('purchase_orders_solicited_date')->nullable();
            $table->integer('providers_id')->unsigned();
            $table->date('preview_arrival_date')->nullable();
            $table->integer('purchase_orders_confirmed_by')->nullable();
            $table->date('purchase_orders_confirmed_at')->nullable();
            $table->integer('purchase_orders_received_by')->nullable();
            $table->date('purchase_orders_arrived_at')->nullable();
            $table->string('purchase_orders_observation')->nullable();
            $table->integer('purchase_orders_is_ok')->nullable();
            $table->string('purchase_orders_complain')->nullable();
            $table->float('purchase_orders_total_price')->nullable();
            $table->timestamps();

            $table->foreign('providers_id')->references('providers_id')->on('mae_providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_purchase_orders');
    }
}
