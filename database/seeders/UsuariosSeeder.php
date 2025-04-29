<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            ['idUsuario' => 1, 'nombre' => 'admin', 'correo' => 'maurisaezr@gmail.com', 'password' => '$2y$12$AeEmWxVExPj2.MsC6xVXIO8efmvBGOxjaboymarNs5VfmvLEP3Jf6', 'idSuscripcion' => 1],
            ['idUsuario' => 2, 'nombre' => 'pepito1', 'correo' => 'pepito@gmail.com', 'password' => '$2y$12$18EUMKAupkrsRJXosJ5e6e.cecZUaRsVayDONqXo5t4H6A7LSiMF2', 'idSuscripcion' => 2],
            ['idUsuario' => 3, 'nombre' => 'usuario1', 'correo' => 'prueba@correo.com', 'password' => '$2y$12$9bkfw32fJE4fi41r.x0ztep9Wls8hQo9.2CNm4Kc4a1mZaabZGLZm', 'idSuscripcion' => 1],
            ['idUsuario' => 4, 'nombre' => 'coni', 'correo' => 'coni@coni.com', 'password' => '$2y$12$sy0BWXVgDmEz0OGmmec/ueoU6Cse7jRvGZXgXtR.QD3T0OZpsWNQ.', 'idSuscripcion' => 1],
            ['idUsuario' => 5, 'nombre' => 'cesar ', 'correo' => 'cesar@cesar.com', 'password' => '$2y$12$IxdFvBz6MnkPHNiIEZyW7OmpjJveIbal0nwLpuxPAauzteNbRPBwy', 'idSuscripcion' => 1],
            ['idUsuario' => 6, 'nombre' => 'usuario2', 'correo' => 'usuario2@usuario2.com', 'password' => '$2y$12$P0QxmeRIs7DaGOdy7.WHte8U75Q1.mNCHoKSLAdxaNBIAQw3o5H8C', 'idSuscripcion' => 1],
            ['idUsuario' => 7, 'nombre' => 'Usuario nuevo', 'correo' => 'nuevousuario@correo.com', 'password' => '$2y$12$N2CWrcVR0NShJyS9zrY9HeIRa5bL7BQljF5XZKyHQmgPHe3aQg5Ve', 'idSuscripcion' => 1],
        ]);
    }
}