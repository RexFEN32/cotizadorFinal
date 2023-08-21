<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinglePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_pieces', function (Blueprint $table) {
            $table->id();

            $table->string('sku')->unique();
            $table->string('piece');
            $table->double('meters',65,4);
            $table->string('caliber');
            $table->double('kgm2',65,4);
            $table->double('m2',65,4);
            $table->decimal('price',65,2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_pieces');
    }
}
