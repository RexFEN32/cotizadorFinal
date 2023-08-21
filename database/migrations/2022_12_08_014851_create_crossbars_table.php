<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossbarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crossbars', function (Blueprint $table) {
            $table->id();

            $table->float('depth');
            $table->string('type',150);
            $table->double('developing',65,3);
            $table->double('length',65,3);
            $table->integer('caliber');
            $table->double('kg_m2',65,2);
            $table->double('weight',65,2);
            $table->double('m2',65,2);
            $table->string('sku');
            $table->decimal('price',65,2);

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
        Schema::dropIfExists('crossbars');
    }
}
