{{-- filepath: d:\laragon\www\elfaro\resources\views\usuarios\perfil.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Mi Perfil</h2>

    {{-- Mostrar mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mostrar mensaje de error --}}
    @if($errors->any())
        <div class="alert alert-danger text-center">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- Formulario para editar el perfil --}}
    <form action="{{ route('usuarios.update', $usuario->idUsuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ $usuario->correo }}" required>
        </div>

        <div class="mb-3">
            <label for="idSuscripcion" class="form-label">Tipo de Suscripción</label>
            <select name="idSuscripcion" class="form-select">
                @foreach($suscripciones as $suscripcion)
                    <option value="{{ $suscripcion->idSuscripcion }}" {{ $usuario->idSuscripcion == $suscripcion->idSuscripcion ? 'selected' : '' }}>
                        {{ $suscripcion->tipo }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>

    {{-- Botón para abrir el modal de agregar artículo --}}
    <div class="mt-4 text-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarArticulo">
            Agregar Artículo
        </button>
    </div>

    {{-- Modal para agregar artículo --}}
<div class="modal fade" id="modalAgregarArticulo" tabindex="-1" aria-labelledby="modalAgregarArticuloLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarArticuloLabel">Agregar Nuevo Artículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('articulos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select name="categoria" class="form-select" required>
                            <option value="" disabled selected>Seleccione la categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->idCategoria }}">{{ $categoria->nombreCategoria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>
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

    {{-- Grid de artículos publicados --}}
    <div class="mt-5">
        <h3 class="text-center">Mis Artículos Publicados</h3>
        @if($articulos->isEmpty())
            <p class="text-center">No has publicado ningún artículo aún.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th>Contenido</th>
                            <th>Fecha de Publicación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articulos as $articulo)
                            <tr>
                                <td>{{ $articulo->titulo }}</td>
                                <td>{{ Str::limit($articulo->contenido, 50) }}</td>
                                <td>{{ $articulo->fechaPublicacion }}</td>
                                <td>
                                    <a href="{{ route('articulos.edit', $articulo->idArticulo) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('articulos.destroy', $articulo->idArticulo) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este artículo?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection