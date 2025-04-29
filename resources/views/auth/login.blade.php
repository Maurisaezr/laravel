
 <!-- VISTA PARA EL LOGIN  Y AGREGAREMOS  REGISTER PARA ACA HACER  EL REDIRECT -->
@extends('layouts.app')

@section('content')



<div class="container mt-5">
    <h2 class="text-center">Iniciar Sesión</h2>

        {{-- Mostrar mensaje de error --}}
        @if($errors->any())
        <div class="alert alert-danger text-center">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
    <hr>
    <h3>No tienes una Cuenta !! Registrate !!</h3>
    <hr>
    <p class="text-center">¿No tienes una cuenta? Regístrate ahora y disfruta de todas las ventajas de ser parte de nuestra comunidad.</p>
    <p class="text-center">Si ya tienes una cuenta, inicia sesión para acceder a tu perfil y disfrutar de nuestros servicios.</p>   

    <a href="{{ route('register.form') }}" class="btn btn-secondary mt-3">Registrarse</a>
</div>
@endsection