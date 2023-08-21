<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBucklingsTable extends Migration
{
    public function up()
    {
        Schema::create('bucklings', function (Blueprint $table) {
            $table->id();
            
            $table->float('buckling');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bucklings');
    }
}
