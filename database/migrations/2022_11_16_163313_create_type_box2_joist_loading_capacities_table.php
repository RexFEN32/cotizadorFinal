<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeBox2JoistLoadingCapacitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_box2_joist_loading_capacities', function (Blueprint $table) {
            $table->id();

            $table->integer('caliber');
            $table->integer('loading_capacity');
            $table->double('crossbar_length',65,2);
            $table->double('camber',65,2);
            
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
        Schema::dropIfExists('type_box2_joist_loading_capacities');
    }
}
