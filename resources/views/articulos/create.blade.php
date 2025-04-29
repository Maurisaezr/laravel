{{-- resources/views/articulos/create.blade.php --}}



@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Agregar Nuevo Artículo</h2>

        <button type="button" class="d-flex align-items-center gap-2 shadow px-3 py-2 rounded-pill position-fixed"
                style="bottom: 20px; right: 20px; z-index: 999; background: linear-gradient(to right, #0099cc, #00c6ff); border: none;"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <div class="d-flex justify-content-center align-items-center rounded-circle bg-white"
                 style="width: 30px; height: 30px;">
                <i class="bi bi-file-earmark-plus" style="color: #0099cc; font-size: 1.5rem;"></i>
            </div>
            <span class="fw-bold text-white">Agregar Artículo</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar nuevo artículo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('articulos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <select name="categoria" class="form-select" required>
                                    <option value="" selected>Seleccione la categoría</option>
                                    <option value="generales">General</option>
                                    <option value="deporte">Deporte</option>
                                    <option value="emprendimiento">Emprendimientos y Negocios</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título del Artículo</label>
                                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título ejemplo" required>
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Información del Artículo</label>
                                <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Agregar Artículo</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
