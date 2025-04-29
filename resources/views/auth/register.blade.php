
@extends('layouts.app')
 <!-- formulario de registro  para nuevos miembros  -->
@section('content')
<div class="container mt-5">
    <h2 class="text-center">Registro</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="idSuscripcion" class="form-label">Tipo de Suscripción</label>
            <select name="idSuscripcion" class="form-select" required>
                @foreach($suscripciones as $suscripcion)
                    <option value="{{ $suscripcion->idSuscripcion }}">{{ $suscripcion->tipo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>
@endsection