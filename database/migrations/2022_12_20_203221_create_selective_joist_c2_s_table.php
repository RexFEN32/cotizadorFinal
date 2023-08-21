<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectiveJoistC2STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selective_joist_c2_s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->integer('amount')->nullable();
            $table->string('caliber')->nullable();
            $table->string('skate')->nullable();
            $table->double('loading_capacity',65,4)->nullable();
            $table->string('type_joist')->nullable();
            $table->double('length_meters',65,4)->nullable();
            $table->double('camber',65,4)->nullable();
            $table->double('weight_kg',65,4)->nullable();
            $table->double('m2',65,4)->nullable();
            $table->double('length',65,4)->nullable();
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
        Schema::dropIfExists('selective_joist_c2_s');
    }
}
