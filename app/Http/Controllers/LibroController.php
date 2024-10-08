<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function CrearLibro(Request $request)
    {
        // Validación
        $validacion = [
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:100',
            'isbn' => 'required|string|max:13|unique:libros,isbn',
            'numero_paginas' => 'required|integer',
            'anio_publicacion' => 'required|date',
            'editorial' => 'nullable|string|max:100',
            'resumen' => 'nullable|string',
        ];

        // Validar datos
        $validar_datos = $request->validate($validacion);

        // Insertar datos en tabla libros
        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'isbn' => $request->isbn,
            'numero_paginas' => $request->numero_paginas,
            'anio_publicacion' => $request->anio_publicacion,
            'editorial' => $request->editorial,
            'resumen' => $request->resumen,
        ]);

        return redirect()->route('VerLibros')->with('success', 'Libro creado correctamente');
    }

    public function ver_formulario()
    {
        return view('libros.formulario');
    }

    // Función para ver todos los libros
    public function VerLibros(Request $request)
    {
        $libros = Libro::orderBy('anio_publicacion', 'asc')->paginate(5);

        return view('libros.index', compact('libros'));
    }

    // Función para ver un libro por id
    public function VerLibro($id)
    {
        $libro = Libro::find($id);

        return response()->json(['message' => 'El libro buscado es:', 'libro' => $libro]);
    }

    public function delete_libro($id)
    {
        $libro = Libro::find($id);

        if ($libro) {
            $libro->delete();
            return redirect()->route('VerLibros')->with('success', 'Libro eliminado correctamente');
        } else {
            return redirect()->route('VerLibros')->with('error', 'Libro no encontrado');
        }
    }

    public function update_libro(Request $request, $id)
    {
        $libro = Libro::where('id', $id);

        $libro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'isbn' => $request->isbn,
            'numero_paginas' => $request->numero_paginas,
            'anio_publicacion' => $request->anio_publicacion,
            'editorial' => $request->editorial,
            'resumen' => $request->resumen,
        ]);

        return redirect()->route('VerLibros')->with('success', 'Libro ha sido actualizado');
    }
}