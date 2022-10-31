<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cuarentena extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuarentenas',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('criaID');
            $table->timestamp('ingreso')->useCurrent();
            $table->dateTime('salida')->nullable();

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
