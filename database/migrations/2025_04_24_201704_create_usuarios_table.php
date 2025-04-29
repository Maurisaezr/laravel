<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //MODIFIQUE SEGUN DOCUMENTACION CRUD PHP LARAVEL  -  AGREGANDO LOS CAMPOS  DE LA DB  CON SU RESPECTIVO TIPO DE DATO 
     public function up()
     {
         Schema::create('usuarios', function (Blueprint $table) {
             $table->id('idUsuario');
             $table->string('nombre');
             $table->string('correo')->unique();
             $table->string('contraseña');
             $table->string('tipoSuscripcion')->nullable();
             $table->unsignedBigInteger('idSuscripcion')->nullable();
             $table->timestamps();
     
             $table->foreign('idSuscripcion')->references('idSuscripcion')->on('suscripciones')->onDelete('set null');
         });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
