<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $table = 'suscripciones'; // Nombre de la tabla que tengo en mysql
// aca los campos
    protected $fillable = [
        'tipo',
        'precio',
        'duracion',
        'beneficios',
    ];

    // Relación con la tabla usuarios 
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idSuscripcion', 'idSuscripcion');
    }
}