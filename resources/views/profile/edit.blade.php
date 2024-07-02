<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="{{ asset('perfil.css') }}">
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
                <div class="active-window-style">
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
        




    <div class= "content_section"> 
        <main class="main-content">
            <section class="profile-box">
                <h2 class="profile-title">PERFIL</h2>
                <div class="profile-image">
                    <img src="{{ asset('/storage/images/Perfil.png') }}" alt="Imagen de perfil">
                </div>
                <h3 style="color: rgb(255 255 255 / 60%);">Bienvenido, {{ Auth::user()->name }}</h3>
                <p style="color: rgb(255 255 255 / 60%);">Correo electrónico: {{ Auth::user()->email }}</p>
                <div class="edit-section">
                    <div class="edit-sub-section">
                        <div class="edit-profile-info">
                            <div class="prof-inf">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
        
                        <div class="edit-password">
                            <div class="edit-pass">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
        
                        <div class="edit-delete-acc">
                            <div class="delete-acc">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        
    </div>









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