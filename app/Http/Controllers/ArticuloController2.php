<?php

namespace App\Http\Controllers;

use App\Services\DatabaseServiceAdvanced;
use Illuminate\Http\Request;

class ArticuloController2 extends Controller // Cambiado de ArticuloController a ArticuloController2
{
    protected $dbService;

    public function __construct(DatabaseServiceAdvanced $dbService)
    {
        $this->dbService = $dbService;
    }

    // Usando sentencias preparadas
    public function getArticulos()
    {
        //query preparada adhoc donde indica obtener todos los registros mientras el id sea 1 y muestra todos los campos
        $sql = "SELECT * FROM articulos WHERE categoria = ?";
        // aca prepara la query y se aprecia el atributo posicinal pasando el id 1
        $articulos = $this->dbService->queryPrepared($sql, [8]);

        return response()->json($articulos);
    }

    // Usando procedimiento almacenado
    public function createArticuloProcedure(Request $request)
    {
        $this->dbService->callProcedureAdvanced('InsertArticulo', [
            $request->titulo,
            $request->contenido,
            $request->fechaPublicacion,
            $request->autor,
            $request->categoria
        ]);

        return response()->json(['message' => 'Artículo creado con éxito mediante procedimiento']);
    }
}