<?php

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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('autor', 100);
            $table->string('isbn', 13)->unique();
            $table->integer('numero_paginas');
            $table->date('anio_publicacion');
            $table->string('editorial', 100)->nullable();
            $table->text('resumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
