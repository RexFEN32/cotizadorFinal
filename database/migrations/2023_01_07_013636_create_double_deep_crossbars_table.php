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
        Schema::create('double_deep_crossbars', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->integer('amount')->nullable();
            $table->string('type')->nullable();
            $table->double('depth',65,4)->nullable();
            $table->double('developing',65,4)->nullable();
            $table->double('long',65,4)->nullable();
            $table->string('caliber')->nullable();
            $table->double('kg_m2',65,4)->nullable();
            $table->double('weight',65,4)->nullable();
            $table->double('m2',65,4)->nullable();
            $table->double('connector',65,4)->nullable();
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
        Schema::dropIfExists('double_deep_crossbars');
    }
};
