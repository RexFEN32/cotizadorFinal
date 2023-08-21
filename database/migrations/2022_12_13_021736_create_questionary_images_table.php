<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionaryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionary_images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->string('image')->nullable();
                
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
        Schema::dropIfExists('questionary_images');
    }
}
