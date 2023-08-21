<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepthMinisTable extends Migration
{
    public function up()
    {
        Schema::create('depth_minis', function (Blueprint $table) {
            $table->id();
            
            $table->float('depth_mini');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depth_minis');
    }
}
