<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chair_joist_galvanized_panels', function (Blueprint $table) {
            $table->id();

            $table->double('development_fund',64,3);
            $table->double('front_development',64,3);
            $table->double('background_dimension',64,3);
            $table->double('length_dimension',64,3);
            $table->double('frame_background',64,3);
            $table->string('sku');
            $table->integer('caliber');
            $table->double('kg_m2',64,2);
            $table->double('weight',64,3);
            $table->double('m2',64,2);
            $table->decimal('import',64,2);
            
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
        Schema::dropIfExists('chair_joist_galvanized_panels');
    }
};
