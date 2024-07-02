

<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->titulo }}</title>
    <link rel="stylesheet" href="{{ asset('biblioteca.css') }}">

</head>
<body>
    
    <header>
        <a href="/">
            <div class="logo">
                <img src="{{ asset('/storage/images/bibliotech_logo.png') }}" alt="Logo de BiblioTech">
                <h1 class="logo-text">BiblioTech</h1>
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
                    <div class="another-window-style">
                        <li><a href="{{ url('/books') }}">Gestionar Libros</a></li>
                    </div>
                @endif
            </ul>
        </nav>

        <div class="user-and-search">
            <div class="user-data">
                <div class="username">
                    {{ Auth::user()->name }}
                </div>
                <div class="logout-">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                                       this.closest('form').submit();">
                            {{ __('Log Out') }}
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
    
    <main>
        <div class="main-book-show">
            <div class="book-show-info">
                <div class="book-show-image">
                    <img src="{{ asset($book->imagen_portada) }}" alt="Portada del libro" style="width: 200px;height: auto;border-radius: 20px;">
                </div>
                <div class="book-info-options">
                    <h1>{{ $book->titulo }}</h1>
                    <p><strong>Autor:</strong> {{ $book->autor }}</p>
                    <p><strong>Categoría:</strong> {{ $book->categoria }}</p>

                    <!-- Botón de favoritos -->
                    <form action="{{ route('favorites.toggle', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="favorite-toggle-button">
                            {{ in_array($book->id, Auth::user()->favorite_books ?? []) ? 'Eliminar de Favoritos' : 'Agregar a Favoritos' }}
                        </button>

                    </form>
                    <form action="{{ route('readeds.toggle', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="readed-toggle-button">
                            {{ in_array($book->id, Auth::user()->readed_books ?? []) ? 'Eliminar de Leídos' : 'Agregar a Leídos' }}
                        </button>
                    </form>
                    </div>
                </div>
            <div class="book-content">
                <h2>Contenido del Libro:</h2>
                <p>{{ file_get_contents(public_path($book->contenido)) }}</p>
            </div>
        </div>
    </main>
    
    <footer class="footer">
        <nav>
            <ul>
                <li><a href="{{ url('/avisolegal') }}">Aviso Legal</a></li>
                <li><a href="#">Política de Privacidad</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
        <p>®BIBLIOTECH 2024</p>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="{{ asset('js/search.js') }}"></script>

</body>
</html>
