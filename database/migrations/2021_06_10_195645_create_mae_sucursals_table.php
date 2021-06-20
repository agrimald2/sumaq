<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_sucursals', function (Blueprint $table) {
            $table->increments('sucursals_id');
            $table->string('sucursals_name')->nullable();
            $table->string('sucursals_address')->nullable();
            $table->integer('sucursals_is_active')->nullable();
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
        Schema::dropIfExists('mae_sucursals');
    }
}
