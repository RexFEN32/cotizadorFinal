<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepthsTable extends Migration
{

    public function up()
    {
        Schema::create('depths', function (Blueprint $table) {
            $table->id();
            
            $table->float('depth');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depths');
    }
}
