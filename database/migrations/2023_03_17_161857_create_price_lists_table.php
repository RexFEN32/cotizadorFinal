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
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();

            $table->string('description');
            $table->string('caliber');
            $table->string('type');
            $table->string('system');
            $table->string('piece');
            $table->decimal('cost',65,2);
            $table->decimal('f_vta',65,3);
            $table->decimal('f_desp',65,3);
            $table->decimal('f_emb',65,3);
            $table->decimal('f_desc',65,3);
            $table->decimal('f_total',65,3);

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
        Schema::dropIfExists('price_lists');
    }
};
