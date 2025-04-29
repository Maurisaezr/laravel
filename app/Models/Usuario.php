<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios'; // Nombre de la tabla
    protected $primaryKey = 'idUsuario'; // Clave primaria personalizada

    public $incrementing = true; // Indica que la clave primaria es autoincremental
    protected $keyType = 'int'; // Tipo de la clave primaria

    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'idSuscripcion',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function suscripcion()
    {
        return $this->belongsTo(Suscripcion::class, 'idSuscripcion', 'idSuscripcion');
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'autor', 'idUsuario');
    }

    public function perfil()
{
    // Obtener al usuario autenticado desde la sesión
    $usuario = session('usuario');

    // Obtener todas las suscripciones
    $suscripciones = \App\Models\Suscripcion::all();

    // Obtener los artículos publicados por el usuario
    $articulos = $usuario->articulos;

    // Pasar los datos del usuario, suscripciones y artículos a la vista
    return view('usuarios.perfil', compact('usuario', 'suscripciones', 'articulos'));
}
}


