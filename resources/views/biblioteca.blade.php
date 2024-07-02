<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online</title>
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
                <div class="active-window-style">
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
    
    <main>
        <!-- Sección: Recién vistos -->
        @if($recienVistos->isNotEmpty())
        <section class="category-biblioteca">
            <div class="category-title">
                <h2>Recién Vistos</h2>
                <p>Libros que has visto recientemente</p>
            </div>
            <div class="category-items">
                @foreach($recienVistos as $book)
                    <div class="book-item">
                        <a href="{{ route('book.show', $book->id) }}">
                            <img src="{{ asset($book->imagen_portada) }}" alt="Portada del libro">
                            <div class="book-info">
                                <h3>{{ $book->titulo }}</h3>
                                <p>Autor: {{ $book->autor }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Primera sección: 6 libros -->
        <section class="category-biblioteca">
            <div class="category-title">
                <h2>Novedades</h2>
                <p>Lo más nuevo de nuestro catalogo!!!</p>
            </div>
            <div class="category-items">
                @foreach($firstSectionBooks as $book)
                    <div class="book-item">
                        <a href="{{ route('book.show', $book->id) }}">
                            <img src="{{ asset($book->imagen_portada) }}" alt="Portada del libro">
                            <div class="book-info">
                                <h3>{{ $book->titulo }}</h3>
                                <p>Autor: {{ $book->autor }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
        
        <!-- Segunda sección: 12 libros -->
        <section class="category-biblioteca">
            <div class="category-title">
                <h2>Más Populares</h2>
                <p>Libros más leidos ultimamente</p>
            </div>
            <div class="category-items">
                @foreach($secondSectionBooks as $book)
                    <div class="book-item">
                        <a href="{{ route('book.show', $book->id) }}">
                            <img src="{{ asset($book->imagen_portada) }}" alt="Portada del libro">
                            <div class="book-info">
                                <h3>{{ $book->titulo }}</h3>
                                <p>Autor: {{ $book->autor }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
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

    @if (Auth::user()->user_type === 'default_value')
        <div class="verify-section">
            <form id="verify-form" action="{{ route('verify.user') }}" method="GET" style="display:none;">
                @csrf
            </form>
            <p>Considera subscribirte para ver el contenido de los libros!!</p>
            <button class="floating-button" onclick="document.getElementById('verify-form').submit();">
                Suscribirse
            </button>
        </div>
    @endif
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="{{ asset('js/search.js') }}"></script>

</body>
</html>
