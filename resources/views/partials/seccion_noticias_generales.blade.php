<div id="CantidadArticulos" class="text-center mb-4"></div>
<!-- Sección de Noticias Generales -->
<section class="container my-5" id="generales">
    <h2 class="text-center mb-4">📄 Noticias Generales</h2>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($articulosGenerales as $articulo)
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

<!-- nuevo carrousel tipo card https://codingyaar.com/bootstrap-carousel-multiple-items-increment-by-1/#-->

<div id="carouselExampleControls" class="carousel">
    <div class="carousel-inner">
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>