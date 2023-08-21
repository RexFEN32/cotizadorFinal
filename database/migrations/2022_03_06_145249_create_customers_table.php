<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_classification_id');
            $table->foreign('customer_classification_id')
                ->references('id')
                ->on('customer_classifications');
            $table->unsignedBigInteger('customer_type_id');
            $table->foreign('customer_type_id')
                ->references('id')
                ->on('customer_types');
            $table->string('customer', 150);
            $table->string('campus', 150);
            $table->string('rfc', 18)->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('suburb')->nullable();
            $table->string('address')->nullable();
            $table->string('outdoor')->nullable();
            $table->string('indoor')->nullable();
            $table->string('zip_code', 5)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telephone', 10)->nullable();
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')
                ->references('id')
                ->on('sectors');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('customers');
    }
}
