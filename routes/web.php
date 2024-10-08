<?php

use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ver_formulario', [LibroController::class, 'ver_formulario']);
Route::post('/CrearLibro', [LibroController::class, 'CrearLibro']);
Route::get('/VerLibros', [LibroController::class, 'VerLibros'])->name('VerLibros');
Route::get('/VerLibro/{id}', [LibroController::class, 'VerLibro']);
Route::delete('/delete_libro/{id}', [LibroController::class, 'delete_libro'])->name('delete_libro');
Route::put('/update_libro/{id}', [LibroController::class, 'update_libro'])->name('update_libro');