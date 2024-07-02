<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotech</title>
    <link rel="stylesheet" href="{{ asset('biblioteca.css') }}">
</head>
<body>
    <div class="background">
        <div class="">
            <div class="center-content-welcome">
                <header class="center-logo">
                    <a>
                        <div class="logo-bibliotech">
                            <img src="{{ asset('/storage/images/bibliotech_logo.png') }}" alt="Logo de BiblioTech" style="width: 150px;padding: 20px;filter: drop-shadow(0px 0px 20px rgb(0 0 0 / 70%));">
                            BiblioTech
                        </div>
                    </a>
                </header>
                <main class="text-bibliotech">
                    <div class="bienvenida-bibliotech">
                        
                    ¡Bienvenido a Bibliotech!
                    Sumérgete en un mundo de historias, conocimientos y aventuras que te esperan entre nuestras páginas. Descubre tesoros literarios, desde clásicos atemporales hasta las últimas novedades, cuidadosamente seleccionados para satisfacer todos los gustos y edades.
                    Explora nuestras estanterías virtuales y déjate llevar por la magia de la lectura. Encuentra tu próximo libro favorito y haz que cada página sea una nueva aventura.
                    ¡Bienvenido a la librería donde los sueños cobran vida a través de las letras!
                    </div>
                    <div>

                    
                    </div>
                </main>
                <div class="logins-option">
                    @if (Route::has('login'))
                        <nav class="bibliotech-redirect-buttons">
                            @auth
                                <p>Que esperas? Ingresa ya!</p>
                                <a
                                    href="{{ url('/biblioteca') }}"
                                    class="biblioteca-redirect"
                                >
                                    Biblioteca
                                </a>
                            @else
                                <p>logueate para acceder a la biblioteca</p>
                                <a
                                    href="{{ route('login') }}"
                                    class="login-redirect-button"
                                >
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <p>Aún no tienes cuenta? Creala ya!</p>
                                    <a
                                        href="{{ route('register') }}"
                                        class="register-redirect-button"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </div>
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
</body>
</html>
