<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('double_deep_heavy_load_frames', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->integer('amount')->nullable();
            $table->string('model')->nullable();
            $table->string('caliber')->nullable();
            $table->double('total_load_kg',65,4)->nullable();
            $table->string('total_poles')->nullable();
            $table->string('total_crossbars')->nullable();
            $table->string('total_diagonals')->nullable();
            $table->string('total_plates')->nullable();
            $table->double('total_kg',65,4)->nullable();
            $table->double('total_m2',65,4)->nullable();
            $table->string('sku')->nullable();
            $table->decimal('total_price',65,2)->nullable();
            
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
        Schema::dropIfExists('double_deep_heavy_load_frames');
    }
};
