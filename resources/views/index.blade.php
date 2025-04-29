@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-4">Bienvenidos a El Faro</h1>
    <p class="lead">Tu sitio de noticias con Laravel</p>
</div>
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif


  <!-- Accesos visuales a otras secciones mejorando lo visual  casi pseudo menu siempre usando la clase CARD de bootstrap-->
  <section class="container mt-5">
    <h2 class="text-center mb-4">Explora nuestras secciones principales</h2>
    <div class="row g-4">
        @foreach($categorias as $categoria)
        <div class="col-md-4">
            <div class="card h-100 text-center border-0 shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria->nombre }}</h5>
                    <p class="card-text">{{ $categoria->descripcionCategoria }}</p>
                    <a href="#{{ Str::slug($categoria->nombre) }}" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
  <hr> <!-- Lo utilizo para la linea de separacion entre temas-->

  <hr> <!-- Lo utilizo para la linea de separacion entre temas-->
<!-----SIGO USANDO ULTIMAS NOTICIAS EXTERNAS EN ESTE PUNTO-------------------------INICIO CARRUSEL ULTIMAS NOTICIAS---------------------------------------------------------->
<!--NUEVA SECCION NUESTROS ARTICULOS MIEMBROS -->


<!-- Mostrar la sección solo para usuarios logueados -->
@auth
    @include('partials.seccion_noticias_ultimominuto')
@endauth
@guest
    <div class="alert alert-warning text-center">
        Debes iniciar sesión para ver esta sección.
    </div>
@endguest
    <hr> <!-- Lo utilizo para la linea de separacion entre temas-->



<!-- Sección de multimedia-->
<!-- Sección de Multimedia integrada y modernizada -->
<section id="multimedia" class="container my-5">

  <h2 class="text-center mb-4">🎥 Sección Multimedia</h2>
  
  <div class="row row-cols-1 row-cols-md-2 g-4">

    <!-- Video Card -->
    <div class="col" data-aos="fade-up">
      <div class="card h-100 shadow-sm">
        <div class="ratio ratio-16x9">
          <video controls>
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            Tu navegador no soporta video HTML5. <a href="video/video.mp4">Descargar video</a>.
          </video>
        </div>
        <div class="card-body">
          <h5 class="card-title">🔐 Ciberseguridad en 2025</h5>
          <p class="text-muted mb-1"><strong>Categoría:</strong> Tecnología</p>
          <p class="card-text">Conversamos con Álvaro Melo, Gerente de Ciberseguridad de ITQ, sobre cómo las empresas pueden hacer frente a las amenazas cibernéticas que evolucionan día a día.</p>
        </div>
      </div>
    </div>

    <!-- Audio Card -->
    <div class="col" data-aos="fade-up">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">🗣️ Chat filtrado en EE.UU. expone tensiones con Europa</h5>
          <p class="text-muted mb-1"><strong>Categoría:</strong> Internacional</p>
          <p class="card-text">Un asesor de seguridad incluyó por error a un periodista en un grupo privado. El incidente reveló conversaciones tensas sobre política internacional, ataques en Yemen y críticas a Europa.</p>
        </div>
        <div class="card-footer bg-white">
          <audio controls class="w-100">
            <source src="audio/audio.mp3" type="audio/mpeg">
            <source src="audio/audio.ogg" type="audio/ogg">
            Tu navegador no soporta audio HTML5. <a href="audio/audio.mp3">Descargar audio</a>.
          </audio>
        </div>
      </div>
    </div>

  </div>
</section>


    <!-- Aquí cargas los parciales  de secciones antiguas separados-->

<!-- Aquí cargas los parciales  de secciones antiguas separados-->

@include('partials.seccion_noticias_generales', ['articulosGenerales' => $articulosGenerales])
@include('partials.seccion_noticias_emprendimiento', ['articulosEmprendimiento' => $articulosEmprendimiento])
@include('partials.seccion_noticias_deportes', ['articulosDeportes' => $articulosDeportes])

<!--NUEVA SECCION NUESTROS ARTICULOS MIEMBROS -->
@include('partials.seccion_nuestros_miembros', ['articulosMiembros' => $articulosMiembros])


 <!---------------------------------------------------FORMULARIO DE CONTACTENOS ACTUALIZADO-------------------------------------------------------------------------->


    <section class="container my-5">
        <h2 class="text-center mb-4">📬 Contáctenos</h2>
        <form action="{{ route('contacto.store') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label for="nombre-contacto" class="form-label">Nombre completo</label>
              <input type="text" class="form-control" id="nombre-contacto" name="nombre" placeholder="Tu nombre completo" required>
            </div>
            <div class="col-md-6">
              <label for="correo-contacto" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo-contacto" name="correo" placeholder="nombre@ejemplo.com" required>
            </div>
            <div class="col-12">
              <label for="mensaje-contacto" class="form-label">Mensaje</label>
              <textarea class="form-control" id="mensaje-contacto" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </form>
      </section>


@endsection
