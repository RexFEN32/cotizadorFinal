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
        Schema::create('wood', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->double('uncut_front',46,2);
            $table->double('cut_front',46,2);
            $table->double('uncut_background',46,2);
            $table->double('cut_background',46,2);
            $table->string('description');
            $table->decimal('cost',46,2);
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
        Schema::dropIfExists('wood');
    }
};
