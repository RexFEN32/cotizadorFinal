<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceStructuralFrameworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_structural_frameworks', function (Blueprint $table) {
            $table->id();

            $table->integer('caliber');
            $table->string('model', 3);
            $table->double('depth');
            $table->double('height');
            $table->integer('poles');
            $table->integer('crossbars');
            $table->integer('diagonals');
            $table->integer('plates');
            $table->double('total_kg');
            $table->double('total_m2');
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
        Schema::dropIfExists('price_structural_frameworks');
    }
}
