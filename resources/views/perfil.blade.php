<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <link rel="stylesheet" href="{{ asset('perfil.css') }}">
</head>
<body>
    <header>
    <a href="/biblioteca">
    <div class="logo" >
              <img  src="{{ asset('/storage/images/bibliotech_logo.png') }}" alt="Logo de BiblioTech">
            BiblioTech
        </div> 
    </a>
        <nav>
            <ul>
                <li><a href="{{ url('/biblioteca') }}">Inicio</a></li>
                <li><a href="{{ url('/categorias') }}">Categorías</a></li>
                <li><a href="{{ url('/favorites') }}">Favoritos</a></li>
                <div class="active-window-style">
                    <li><a href="{{ url('/perfil') }}">Perfil</a></li>
                </div>
                @if (Auth::user()->user_type === 'Admin')
                    <li><a href="{{ url('/books') }}">Gestionar Libros</a></li>
                @endif
            </ul>
        </nav>

        <!-- Responsive Settings Options -->
        <div class="user-data">
            <div class="username">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            </div>

            <div class="logout-" >
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
            <input type="text" placeholder="Buscar...">
            <button type="submit">
                <img src="{{ asset('/storage/images/lupa.png') }}" alt="Buscar">
            </button>
        </div>
    </header>
    
    <main class="main-content">
      <section class="profile-box">
         <h2 class="profile-title">PERFIL</h2>
         <div class="profile-image">
             <img src="{{ asset('/storage/images/Perfil.png') }}" alt="Imagen de perfil">
          </div>
      <h3 style="
    color: rgb(255 255 255 / 60%);">Bienvenido, {{ Auth::user()->name }}</h3>
    <p style="
    color: rgb(255 255 255 / 60%);">Correo electrónico: {{ Auth::user()->email }}</p>
</section>





        <div class= "config-acc">
        </div>







        
        <!-- Otros elementos de la página de perfil -->
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
</body>
</html>

