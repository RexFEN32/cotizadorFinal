<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionaryChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionary_charts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->integer('item')->nullable();
            $table->string('description')->nullable();
            $table->integer('amount')->nullable();
            $table->double('dimensions',65,4)->nullable();
            $table->string('caliber')->nullable();
            $table->string('color')->nullable();
            $table->string('galv')->nullable();
            $table->string('colorless')->nullable();
                
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
        Schema::dropIfExists('questionary_charts');
    }
}
