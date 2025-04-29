<div class="col">
    <div class="card h-100 shadow-sm">
        <img src="{{ $imagen }}" class="card-img-top" alt="Artículo">
        <div class="card-body">
            <h5 class="card-title">{{ $titulo }}</h5>
            <p class="text-muted"><strong>Categoría:</strong> {{ $categoria }}</p>
            <p class="card-text">{{ $descripcion }}</p>
            <a href="{{ $link }}" class="btn btn-outline-primary btn-sm">Leer más</a>
        </div>
    </div>
</div>