<!-- Sección de Artículos de Nuestros Miembros -->
<section class="container my-5" id="miembros">
    <h2 class="text-center mb-4">👥 Artículos Publicados por Nuestros Miembros</h2>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($articulosMiembros as $articulo)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{$articulo->ruta_imagen }}" class="card-img-top" alt="Imagen de {{ $articulo->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $articulo->titulo }}</h5>
                        <p class="text-muted mb-1">
                            <strong>Autor:</strong> {{ $articulo->autor->nombre ?? 'Desconocido' }}
                        </p>
                        <p class="text-muted mb-1">
                            <strong>Categoría:</strong> {{ $articulo->categoria->nombreCategoria ?? 'Sin categoría' }}
                        </p>
                        <p class="card-text">{{ $articulo->contenido }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No hay artículos publicados por los miembros.</p>
        @endforelse
    </div>
</section>