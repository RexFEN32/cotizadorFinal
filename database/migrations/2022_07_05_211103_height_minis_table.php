<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeightMinisTable extends Migration
{
    public function up()
    {
        Schema::create('height_minis', function (Blueprint $table) {
            $table->id();
 
            $table->float('height_mini');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('height_minis');
    }
}
