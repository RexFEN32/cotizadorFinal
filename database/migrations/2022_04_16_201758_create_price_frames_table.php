<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_frames', function (Blueprint $table) {
            $table->id();

            $table->integer('caliber');
            $table->string('model', 3);
            $table->float('depth');
            $table->float('height');
            $table->integer('poles');
            $table->integer('crossbars');
            $table->integer('diagonals');
            $table->integer('plates');
            $table->float('steel_weight_kg');
            $table->float('solera_weight_kg');
            $table->float('total_kg');
            $table->float('total_m2');
            $table->float('price');

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
        Schema::dropIfExists('price_frames');
    }
}
