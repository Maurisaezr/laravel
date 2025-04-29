<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['idCategoria' => 1, 'nombreCategoria' => 'Tecnología', 'descripcionCategoria' => 'Noticias y artículos sobre avances tecnológicos.'],
            ['idCategoria' => 2, 'nombreCategoria' => 'Salud', 'descripcionCategoria' => 'Contenido sobre bienestar físico y mental.'],
            ['idCategoria' => 3, 'nombreCategoria' => 'Educación', 'descripcionCategoria' => 'Recursos y noticias sobre el ámbito educativo.'],
            ['idCategoria' => 4, 'nombreCategoria' => 'Cultura', 'descripcionCategoria' => 'Artículos relacionados con arte, música y tradiciones.'],
            ['idCategoria' => 5, 'nombreCategoria' => 'Actualidad', 'descripcionCategoria' => 'Información sobre eventos y noticias recientes.'],
            ['idCategoria' => 6, 'nombreCategoria' => 'Deportes', 'descripcionCategoria' => 'Noticias de deporte'],
            ['idCategoria' => 7, 'nombreCategoria' => 'Generales', 'descripcionCategoria' => 'Noticias generales'],
            ['idCategoria' => 8, 'nombreCategoria' => 'Emprendimiento', 'descripcionCategoria' => 'Noticias Emprendimiento'],
        ]);
    }
}