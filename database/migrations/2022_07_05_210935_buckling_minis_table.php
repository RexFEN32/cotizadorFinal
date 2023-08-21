<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BucklingMinisTable extends Migration
{
    public function up()
    {
        Schema::create('buckling_minis', function (Blueprint $table) {
            $table->id();
            
            $table->float('buckling_mini');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buckling_minis');
    }
}
