<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/storage/images/bibliotech_logo.png">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso Legal - Bibliotech</title>
    <link rel="stylesheet" href="{{ asset('biblioteca.css') }}">
</head>
<body>
<header>
        <a href="/biblioteca">
            <div class="logo">
                <img src="{{ asset('/storage/images/bibliotech_logo.png') }}" alt="Logo de BiblioTech">
                <h1 class="logo-text">BiblioTech</h1>
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="{{ url('/biblioteca') }}">Inicio</a></li>
                <li><a href="{{ url('/categorias') }}">Categorías</a></li>
                <li><a href="{{ url('/favorites') }}">Favoritos</a></li>
                <li><a href="{{ url('/readeds') }}">Leídos</a></li>
                <li><a href="{{ url('/profile') }}">Perfil</a></li>
                @if (Auth::user()->user_type === 'Admin')
                    <li><a href="{{ url('/books') }}">Gestionar Libros</a></li>
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
        <section class="legal-section">
            <div class="container-legal-section">
                <h1>AVISO LEGAL</h1>
                <div class="legal-content">
                <p>BIENVENIDO A BIBLIOTECH</p>
                    <p>BIBLIOTECH es una plataforma digital dedicada a brindar acceso a una amplia variedad de libros y recursos de lectura. Nuestro objetivo es fomentar la lectura y el conocimiento, proporcionando a nuestros usuarios una experiencia enriquecedora y satisfactoria.</p>
                    <p>1. Propiedad Intelectual</p>
                    <p>Los contenidos de BIBLIOTECH, incluidos pero no limitados a textos, imágenes, logotipos, marcas comerciales y software, están protegidos por las leyes de propiedad intelectual y otros derechos de propiedad. Queda estrictamente prohibida la reproducción, distribución o modificación de estos contenidos sin el consentimiento expreso de BIBLIOTECH.</p>
                    <p>2. Uso de la Plataforma</p>
                    <p>BIBLIOTECH se reserva el derecho de modificar, actualizar o eliminar partes de este aviso legal en cualquier momento y sin previo aviso. Es responsabilidad del usuario revisar periódicamente este aviso legal para estar al tanto de cualquier cambio.</p>
                    <p>3. Limitación de Responsabilidad</p>
                    <p>BIBLIOTECH no se hace responsable por el uso indebido de los contenidos proporcionados en su plataforma. Los usuarios son los únicos responsables de garantizar que su uso de la plataforma cumpla con las leyes y regulaciones aplicables en su jurisdicción.</p>
                    <p>4. Modificaciones y Actualizaciones</p>
                    <p>BIBLIOTECH no se hace responsable por el uso indebido de los contenidos proporcionados en su plataforma. Los usuarios son los únicos responsables de garantizar que su uso de la plataforma cumpla con las leyes y regulaciones aplicables en su jurisdicción.</p>
                    <p>5. Contacto</p>
                    <p>Para cualquier consulta o duda relacionada con este aviso legal, no dudes en ponerte en contacto con nosotros a través de los canales de comunicación proporcionados en nuestra plataforma.</p>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="{{ asset('js/search.js') }}"></script>
</body>
</html>
