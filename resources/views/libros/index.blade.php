<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>  
        @endif
        <h1 class="mb-3">Lista de libros</h1>
        <a href="{{url('ver_formulario')}}" class="btn btn-success">Nuevo libro</a>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Número de Páginas</th>
                    <th>Año de Publicación</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                <tr>
                    <td>{{$libro->id}}</td>
                    <td>{{$libro->titulo}}</td>
                    <td>{{$libro->autor}}</td>
                    <td>{{$libro->isbn}}</td>
                    <td>{{$libro->numero_paginas}}</td>
                    <td>{{$libro->anio_publicacion}}</td>
                    <td>{{$libro->created_at}}</td>
                    <td>{{$libro->updated_at}}</td>
                    <td class="d-flex gap-3">
                        <!-- Botón para abrir el modal de edición -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$libro->id}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>

                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{$libro->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Libro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('update_libro', $libro->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="titulo">Título:</label>
                                                <input type="text" value="{{$libro->titulo}}" name="titulo" id="titulo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="autor">Autor:</label>
                                                <input type="text" value="{{$libro->autor}}" name="autor" id="autor" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="isbn">ISBN:</label>
                                                <input type="text" value="{{$libro->isbn}}" name="isbn" id="isbn" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="numero_paginas">Número de Páginas:</label>
                                                <input type="number" value="{{$libro->numero_paginas}}" name="numero_paginas" id="numero_paginas" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="anio_publicacion">Año de Publicación:</label>
                                                <input type="date" value="{{$libro->anio_publicacion}}" name="anio_publicacion" id="anio_publicacion" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botón para eliminar -->
                        <form action="{{route('delete_libro', $libro->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </form>

                        <!-- Botón para ver detalles -->
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{$libro->id}}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>

                        <!-- Modal de vista de detalles -->
                        <div class="modal fade" id="viewModal{{$libro->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{$libro->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel{{$libro->id}}">Detalles del libro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Título:</strong> {{$libro->titulo}}</p>
                                        <p><strong>Autor:</strong> {{$libro->autor}}</p>
                                        <p><strong>ISBN:</strong> {{$libro->isbn}}</p>
                                        <p><strong>Número de Páginas:</strong> {{$libro->numero_paginas}}</p>
                                        <p><strong>Año de Publicación:</strong> {{$libro->anio_publicacion}}</p>
                                        <p><strong>Creado:</strong> {{$libro->created_at}}</p>
                                        <p><strong>Actualizado:</strong> {{$libro->updated_at}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$libros->links()}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>