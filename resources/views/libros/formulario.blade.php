<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mt-5">
        <h1>Registrar nuevo libro</h1>
        <form action="/CrearLibro" method="post">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required maxlength="150">
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autor" class="form-control" required maxlength="100">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" class="form-control" required maxlength="13">
            </div>
            <div class="form-group">
                <label for="numero_paginas">Número de Páginas:</label>
                <input type="number" name="numero_paginas" id="numero_paginas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="anio_publicacion">Año de Publicación:</label>
                <input type="date" name="anio_publicacion" id="anio_publicacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editorial">Editorial:</label>
                <input type="text" name="editorial" id="editorial" class="form-control" maxlength="100">
            </div>
            <div class="form-group">
                <label for="resumen">Resumen:</label>
                <textarea name="resumen" id="resumen" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</body>

</html>