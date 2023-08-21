<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeightsTable extends Migration
{
    public function up()
    {
        Schema::create('heights', function (Blueprint $table) {
            $table->id();
 
            $table->float('height');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('heights');
    }
}
