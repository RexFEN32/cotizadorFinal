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
        Schema::create('grills', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->double('front',46,2);
            $table->string('color');
            $table->double('background',46,2);
            $table->decimal('cost',46,2);
            $table->double('dimensions',46,3);
            $table->double('loading_capacity',46,3);
            $table->string('joist_type');
            $table->integer('amount');
            $table->decimal('unit_price',46,2);
            $table->decimal('total_price',46,2);
            
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
        Schema::dropIfExists('grills');
    }
};
