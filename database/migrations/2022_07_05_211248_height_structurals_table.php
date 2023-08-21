<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeightStructuralsTable extends Migration
{
    public function up()
    {
        Schema::create('height_structurals', function (Blueprint $table) {
            $table->id();
 
            $table->float('height_structural');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('height_structurals');
    }
}
