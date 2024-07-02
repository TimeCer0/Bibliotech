<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online</title>
    <link rel="stylesheet" href="{{ asset('biblioteca.css') }}">
</head>
<body>
    <header>
        <a href="/">
            <div class="logo">
                <img src="{{ asset('/storage/images/bibliotech_logo.png') }}" alt="Logo de BiblioTech">
                BiblioTech
            </div>
        </a>
        <nav>
            <ul>
                <div class="another-window-style">
                    <li><a href="{{ url('/biblioteca') }}">Inicio</a></li>
                </div>
                <div class="another-window-style">
                    <li><a href="{{ url('/categorias') }}">Categorías</a></li>
                </div>
                <div class="another-window-style">
                    <li><a href="{{ url('/favorites') }}">Favoritos</a></li>
                </div>
                <div class="another-window-style">
                    <li><a href="{{ url('/readeds') }}">Leídos</a></li>
                </div>
                <div class="another-window-style">
                    <li><a href="{{ url('/profile') }}">Perfil</a></li>
                </div>
                @if (Auth::user()->user_type === 'Admin')
                    <div class="active-window-style">
                        <li><a href="{{ url('/books') }}">Gestionar Libros</a></li>
                    </div>
                @endif
            </ul>
        </nav>

        <!-- Responsive Settings Options -->
        <div class="user-and-search">
            <div class="user-data">
                <div class="username">
                    {{ Auth::user()->name }}
                </div>
                <div class="logout-">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                                       this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>

            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Ingrese el nombre de búsqueda" class="form-control" >
                <div id="search_list" class="search-results-container"></div> <!-- Contenedor de resultados -->
            </div>
        </div>
    </header>

    <div class="book-management-content">
        <div class="book-upload">
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
                    <input type="file" id="imagen_portada" name="imagen_portada" class="submit-src-button" required>
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
                    <input type="file" id="contenido" name="contenido" class="submit-src-button" required>
                </div>
                <button type="submit" class="submit-book-button" style="translate: 10px;">Guardar</button>
            </form>
        </div>



        <div class="book-list-content">
            <h1>Lista de Ultimos Libros Agregados</h1>
            @if($books->isEmpty())
                <p>No hay libros disponibles.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Imagen de Portada</th>
                            <th>Autor</th>
                            <th>Categoría</th>
                            <th>Contenido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->titulo }}</td>
                                <td><img src="{{ asset($book->imagen_portada) }}" alt="{{ $book->titulo }}" width="100"></td>
                                <td>{{ $book->autor }}</td>
                                <td>{{ $book->categoria }}</td>
                                <td><a href="{{ asset($book->contenido) }}" target="_blank">Ver Contenido</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="{{ asset('js/search.js') }}"></script>
        </div>
    </div>
</body>
</html>
