<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Crias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crias',function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->Integer('costo');
            $table->Integer('peso');
            $table->Integer('marmoleo');
            $table->Integer('musculo');

            $table->Integer('cardiaca')->nullable();
            $table->Integer('respiratoria')->nullable();
            $table->Integer('sanguinea')->nullable();
            $table->Integer('temperatura')->nullable();

            $table->text('description')->nullable();
            $table->string('estatus', 20)->default('alive')->nullable();
            $table->Integer('proveedor');
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
        Schema::dropIfExists('crias');
    }
}
