<!-- Modal Agregar Artículo -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nuevo artículo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('articulos.store') }}" method="POST">
            @csrf
  
            <!-- Selector de categoría (IDs reales desde la tabla) -->
            <div class="mb-3">
              <label for="categoria" class="form-label">Categoría</label>
              <select name="categoria" class="form-select" required>
                <option value="" disabled selected>Seleccione la categoría</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->idCategoria }}">{{ $categoria->nombreCategoria }}</option>
                @endforeach
              </select>
            </div>
  
            <!-- Título -->
            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" name="titulo" class="form-control" required>
            </div>
  
            <!-- Contenido -->
            <div class="mb-3">
              <label for="contenido" class="form-label">Contenido</label>
              <textarea name="contenido" class="form-control" rows="4" required></textarea>
            </div>
  
            <button type="submit" class="btn btn-primary">Guardar Artículo</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  