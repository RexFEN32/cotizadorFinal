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
        Schema::create('double_deep_floors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->integer('amount')->nullable();
            $table->double('length',65,4);
            $table->double('weight',65,4);
            $table->double('m2',65,4);
            $table->string('camber');
            $table->string('sku')->nullable();
            $table->decimal('unit_price',65,2)->nullable();
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
        Schema::dropIfExists('double_deep_floors');
    }
};
