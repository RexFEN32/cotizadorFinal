<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BucklingStructuralsTable extends Migration
{
    public function up()
    {
        Schema::create('buckling_structurals', function (Blueprint $table) {
            $table->id();
            
            $table->float('buckling_structural');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buckling_structurals');
    }
}
