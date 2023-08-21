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
        Schema::create('quotation_uninstalls', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->integer('amount');
            $table->string('description');
            $table->string('type');
            $table->string('system');
            $table->decimal('cost',65,2);
            $table->decimal('f_total',65,3);
            $table->decimal('import',65,2);
            $table->string('print');
            $table->string('breakdown_uninstall');
            
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
        Schema::dropIfExists('quotation_uninstalls');
    }
};
