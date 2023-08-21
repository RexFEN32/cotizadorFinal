<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuralFrameworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structural_frameworks', function (Blueprint $table) {
            $table->id();

            $table->integer('caliber');
            $table->float('buckling');
            $table->integer('weight')->nullable();
            $table->string('model',3);
            
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
        Schema::dropIfExists('structural_frameworks');
    }
}
