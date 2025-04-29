<!-- NUEVA VERSION DEL FARO USANDO LARAVEL - ADEMAS DIVIDIMOS LAS SECCIONES POR ARCHIVOS PARTIAL PARA MAS ORDEN -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="title" content="EL faro más que noticias">
        <meta name="description" content="Periódico con las últimas informaciones del mundo">
        <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet" type="text/css"/>
        <!-- como bootstrap no tiene animaciones agregamos AOS.CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">  <!-- Implementacion de font -->
        <link href="https://fonts.googleapis.com/css2?family=Italiana:wght@400&display=swap" rel="stylesheet"> <!-- Implementacion de font  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
        <!-- Bootstrap CSS (v5.3) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Cargo boostrap para darle mejor visual a los elementos y hacerlo mas dinamico  -->
    
        <title>Periódico "El Faro"</title>
    </head>
    
       <!-- aca en  cargo la funcion Noticias_ultimo_minuto del otros archivo JS , asi ya llenamos las ultimas noticias -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        Noticias_ultimo_minuto();
      });
    </script>
    
<body onload="mueveReloj(); initClock(); Noticias_ultimo_minuto()">

    <!-- AVISO -->
    <div class="bg-danger text-white text-center p-2">
        🔔 AVISO: Bienvenidos al nuevo sitio de El Faro versión Laravel
    </div>

    <!-- Botón "Mi Perfil" si el usuario está autenticado -->
    @if(session('usuario'))
        <a href="{{ route('perfil') }}" class="btn btn-secondary">Mi Perfil</a>
    @endif
    @include('partials.header')

    <!-- al igual que el otro codigo if es el formulario de login  muestro algunas cosas si no no -->
    @if(Route::currentRouteName() !== 'login.form' && Route::currentRouteName() !== 'register.form' && Route::currentRouteName() !== 'perfil')
        <!-- Header -->
       
        <!-- Antigua sección MAIN -->
        @include('partials.tagmain')

        <!-- Modal para agregar artículos -->
       
        @include('partials.modalAgregarArticulo')
        <!-- Artículos destacados -->
        @include('partials.articulosdestacados')
    @endif

    <!-- Contenido principal -->
    <main class="container py-4 mt-5">
        @yield('content')<!-- contenido especifico -->
    </main>


    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/js/funciones.js') }}"></script>
    <script src="{{ asset('assets/js/parausarRSS.js') }}"></script>
    <script>AOS.init();</script>
</body>
</html>