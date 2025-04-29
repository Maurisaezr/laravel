<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos'; // Nombre de la tabla
    protected $primaryKey = 'idArticulo'; // Clave primaria personalizada

    protected $fillable = [
        'titulo',
        'contenido',
        'fechaPublicacion',
        'autor',
        'categoria',
        'ruta_imagen'
    ];

    public function autor()
    {
        return $this->belongsTo(Usuario::class, 'autor', 'idUsuario');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'idCategoria');
    }
}