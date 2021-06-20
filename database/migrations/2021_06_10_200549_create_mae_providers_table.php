<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_providers', function (Blueprint $table) {
            $table->increments('providers_id');
            $table->string('providers_name')->nullable();
            $table->integer('providers_id_number')->nullable();
            $table->string('providers_address')->nullable();
            $table->string('providers_encargado')->nullable();
            $table->string('providers_mobile')->nullable();
            $table->integer('providers_is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_providers');
    }
}
