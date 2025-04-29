<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactosSeeder extends Seeder
{
    public function run()
    {
        DB::table('contactos')->insert([
            ['idMensaje' => 1, 'nombre' => 'Mauricio', 'correo' => 'maurisaezr@gmail.com', 'mensaje' => 'SDSADSADSAD', 'fechaEnvio' => '2025-04-25', 'created_at' => '2025-04-25 20:13:37', 'updated_at' => '2025-04-25 20:13:37'],
            ['idMensaje' => 2, 'nombre' => 'Cesar', 'correo' => 'cesar@cesar.com', 'mensaje' => 'hola necesito qu me contacten', 'fechaEnvio' => '2025-04-26', 'created_at' => '2025-04-27 02:32:55', 'updated_at' => '2025-04-27 02:32:55'],
            ['idMensaje' => 3, 'nombre' => 'Mauricio1', 'correo' => 'maurisaezr@gmail.com', 'mensaje' => 'test de mensaje', 'fechaEnvio' => '2025-04-28', 'created_at' => '2025-04-29 01:13:41', 'updated_at' => '2025-04-29 01:13:41'],
            ['idMensaje' => 4, 'nombre' => 'Mauricio', 'correo' => 'maurisaezr@gmail.com', 'mensaje' => 'PRUEBA', 'fechaEnvio' => '2025-04-28', 'created_at' => '2025-04-29 02:53:10', 'updated_at' => '2025-04-29 02:53:10'],
        ]);
    }
}