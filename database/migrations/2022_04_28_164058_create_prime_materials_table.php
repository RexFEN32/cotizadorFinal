<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimeMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prime_materials', function (Blueprint $table) {
            $table->id();

            $table->string('sku')->nullable();
            $table->string('product');
            $table->string('especifications')->nullable();
            $table->string('measurement_unit')->nullable();
            $table->string('description')->nullable();
            $table->float('cost');
            $table->string('status');

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
        Schema::dropIfExists('prime_materials');
    }
}
