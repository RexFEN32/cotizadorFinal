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
        Schema::create('quot_chair_j_painted_panels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->string('sku');
            $table->integer('amount');
            $table->integer('caliber');
            $table->double('background_dimension',64,3);
            $table->double('length_dimension',64,3);
            $table->double('weight',64,3);
            $table->double('total_weight',64,3);                      
            $table->double('m2',64,2);
            $table->decimal('price_unit',64,2);
            $table->decimal('total_price',64,2);
            
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
        Schema::dropIfExists('quot_chair_j_painted_panels');
    }
};
