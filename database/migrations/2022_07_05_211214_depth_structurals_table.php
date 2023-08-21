<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepthStructuralsTable extends Migration
{
    public function up()
    {
        Schema::create('depth_structurals', function (Blueprint $table) {
            $table->id();
            
            $table->float('depth_structural');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depth_structurals');
    }
}
