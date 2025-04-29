{{-- resources/views/articulos/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h2>Artículos Publicados</h2>
    <ul>
        @foreach($articulos as $articulo)
            <li>
                <h3>{{ $articulo->titulo }}</h3>
                <p>{{ $articulo->descripcion }}</p>
                <p><strong>Categoría:</strong> {{ $articulo->categoria }}</p>
            </li>
        @endforeach
    </ul>
@endsection