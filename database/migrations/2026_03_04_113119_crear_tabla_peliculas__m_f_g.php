<?php
//María Fernandez Gilarte
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',60);
            $table->string('direccion',100);
            $table->integer('duracion');
            $table->tinyText('argumento');
            $table->integer('anio');
            $table->unsignedBigInteger('genero');
            $table->foreign('genero')->references('id')->on('generos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
