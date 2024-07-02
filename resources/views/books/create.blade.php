<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Libro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Subir Nuevo Libro</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="imagen_portada">Imagen de Portada:</label>
                <input type="file" id="imagen_portada" name="imagen_portada" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <input type="file" id="contenido" name="contenido" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
    
</body>
</html>
