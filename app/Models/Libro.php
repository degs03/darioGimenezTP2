<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{

    use HasFactory;

    protected $table = 'libros'; // Nombre de la tabla
    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'numero_paginas',
        'anio_publicacion',
        'editorial',
        'resumen'
    ];
}
