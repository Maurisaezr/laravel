<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id('idArticulo');
            $table->string('titulo');
            $table->longText('contenido');
            $table->date('fechaPublicacion');
            $table->unsignedBigInteger('autor');
            $table->unsignedBigInteger('categoria');
            $table->string('ruta_imagen')->nullable();
            $table->timestamps();
    
            $table->foreign('autor')->references('idUsuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('categoria')->references('idCategoria')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
