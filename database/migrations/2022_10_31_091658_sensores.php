<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sensores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensores',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('criaID');

            $table->Integer('cardiaca')->default(0);
            $table->Integer('respiratoria')->default(0);
            $table->Integer('sanguinea')->default(0);
            $table->float('temperatura', 4, 1)->default(37.5);

            $table->timestamps();

            $table->foreign('criaID')->references('id')->on('crias')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists();
    }
}
