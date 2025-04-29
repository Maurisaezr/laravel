<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuscripcionesSeeder extends Seeder
{
    public function run()
    {
        DB::table('suscripciones')->insert([
            ['idSuscripcion' => 1, 'tipo' => 'Básica', 'precio' => 10000, 'duracion' => 30, 'beneficios' => 'Acceso limitado a noticias.'],
            ['idSuscripcion' => 2, 'tipo' => 'Premium', 'precio' => 25000, 'duracion' => 90, 'beneficios' => 'Acceso completo a noticias y contenido exclusivo.'],
            ['idSuscripcion' => 3, 'tipo' => 'VIP', 'precio' => 50000, 'duracion' => 365, 'beneficios' => 'Acceso completo, contenido exclusivo y eventos especiales.'],
        ]);
    }
}