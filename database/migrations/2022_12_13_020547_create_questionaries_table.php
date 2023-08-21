<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionaries', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id');
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations');
            $table->string('a1')->nullable();
            $table->string('a2')->nullable();
            $table->string('a3')->nullable();
            $table->string('a4')->nullable();
            $table->string('a5')->nullable();
            $table->string('a6')->nullable();
            $table->string('a7')->nullable();
            $table->string('a8')->nullable();
            $table->string('a9')->nullable();
            $table->string('a10')->nullable();
            $table->string('a11')->nullable();
            $table->string('a12')->nullable();
            $table->string('a13')->nullable();
            $table->string('a14')->nullable();
            $table->string('a15')->nullable();
            $table->string('a16')->nullable();
            $table->string('a17')->nullable();
            $table->string('a18')->nullable();
            $table->string('a19')->nullable();
            $table->string('a20')->nullable();
            $table->string('a21')->nullable();
            $table->string('a22')->nullable();
            $table->string('a23')->nullable();
            $table->string('a24')->nullable();
            $table->string('a25')->nullable();
            $table->string('a26')->nullable();
            $table->string('a27')->nullable();
            $table->string('a28')->nullable();
            $table->string('a29')->nullable();
            $table->string('a30')->nullable();
            $table->string('a31')->nullable();
            $table->string('a32')->nullable();
            $table->string('a33')->nullable();
            $table->string('a34')->nullable();
            $table->string('a35')->nullable();
            $table->string('a36')->nullable();
            $table->string('a37')->nullable();
            $table->string('a38')->nullable();
            $table->string('a39')->nullable();
            $table->string('a40')->nullable();
            $table->string('a41')->nullable();
            $table->string('a42')->nullable();
            $table->string('a43')->nullable();
            // $table->string('a44')->nullable();
            // $table->string('a45')->nullable();
            // $table->string('a46')->nullable();
            // $table->string('a47')->nullable();
            // $table->string('a48')->nullable();
            // $table->string('a49')->nullable();
            // $table->string('a50')->nullable();
            // $table->string('a51')->nullable();
            // $table->string('a52')->nullable();
            // $table->string('a53')->nullable();
            // $table->string('a54')->nullable();
            // $table->string('a55')->nullable();
            // $table->string('a56')->nullable();
            // $table->string('a57')->nullable();
            // $table->string('a58')->nullable();
            // $table->string('a59')->nullable();
            // $table->string('a60')->nullable();
            // $table->string('a61')->nullable();
            // $table->string('a62')->nullable();
            // $table->string('a63')->nullable();
            
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
        Schema::dropIfExists('questionaries');
    }
}
