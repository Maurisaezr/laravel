<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos'; // Nombre de la tabla en la base de datos
//aca ek fillable es para asignacion masiva visto en el video de 45min
    protected $fillable = [
        'nombre',
        'correo',
        'mensaje',
        'fechaEnvio',
    ];
}