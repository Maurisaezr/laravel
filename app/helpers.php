<?php
use App\Models\Categoria;

if (!function_exists('categoriaNombre')) {
    function categoriaNombre($idCategoria)
    {
        $categoria = Categoria::find($idCategoria);
        return $categoria ? $categoria->nombreCategoria : 'Sin categoría';
    }
}