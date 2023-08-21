<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserZonesTable extends Migration
{
    public function up()
    {
        Schema::create('user_zones', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')
                ->references('id')
                ->on('zones');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_zones');
    }
}
