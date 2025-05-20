<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- AGREGA ESTA LÍNEA
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'nombre',
        'comentario',
    ];
}