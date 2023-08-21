<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeBox2JoistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_box2_joists', function (Blueprint $table) {
            $table->id();

            $table->integer('caliber');
            $table->double('length',65,2);
            $table->double('weight',65,4);
            $table->double('m2',65,4);
            $table->double('camber',65,4);
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
        Schema::dropIfExists('type_box2_joists');
    }
}
