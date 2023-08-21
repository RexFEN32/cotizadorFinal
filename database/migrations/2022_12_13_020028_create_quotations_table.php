<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            $table->string('invoice');
            $table->string('system');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
            $table->string('type')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->decimal('system_price',65,2)->nullable();
            $table->decimal('installation_price',65,2)->nullable();
            $table->decimal('transfer_price',65,2)->nullable();
            $table->string('status');

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
        Schema::dropIfExists('quotations');
    }
}
