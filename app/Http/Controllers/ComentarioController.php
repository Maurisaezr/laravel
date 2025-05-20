<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario; // <-- AGREGA ESTA LÍNEA
class ComentarioController extends Controller

{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'comentario' => 'required|max:500',
        ]);
        Comentario::create($request->only('nombre', 'comentario'));
        return redirect()->back()->with('success', 'Comentario agregado');
    }
}
