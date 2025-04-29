<!-- Sección de Emprendimientos-->
<!-- Sección de Emprendimientos -->
<section class="container my-5" id="emprendimiento">
  <h2 class="text-center mb-4">💼 Noticias de Emprendimiento</h2>
  
  <div class="row row-cols-1 row-cols-md-3 g-4">
      @forelse ($articulosEmprendimiento as $articulo)
          <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="{{$articulo->ruta_imagen }}" class="card-img-top" alt="Imagen de {{ $articulo->titulo }}">
                  <div class="card-body">
                      <h5 class="card-title">{{ $articulo->titulo }}</h5>
                      <p class="text-muted mb-1">
                          <strong>Categoría:</strong> {{ $articulo->categoria->nombreCategoria ?? 'Sin categoría' }}
                      </p>
                      <p class="card-text">{{ $articulo->contenido }}</p>
                  </div>
              </div>
          </div>
      @empty
          <p class="text-center">No hay artículos disponibles en esta categoría.</p>
      @endforelse
  </div>
</section>