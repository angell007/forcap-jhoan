<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('empresarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fundacion')->nullable();
            $table->string('nombre');
            $table->string('documento');
            $table->string('numero_documento');
            $table->string('contacto');
            $table->string('direccion');
            $table->string('barrio')->nullable();
            $table->string('comuna')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('empresarios');
    }
}
