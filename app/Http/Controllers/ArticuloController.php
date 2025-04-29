<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::all();
    
        return view('index', ['articulos' => $articulos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulos.create');  // aca el create se supone que inserta el nuevo articulo sobre la bd 
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    //  aca  esta funcion por default que se creo y segun la documentacion del profe guarda los datos 
    public function store(Request $request)
{
    // Verificar que el usuario esté autenticado
    if (!auth()->check()) {
        return redirect()->route('login.form')->with('error', 'Debes iniciar sesión para agregar un artículo.');
    }

    $request->validate([
        'titulo' => 'required|string|max:255',
        'contenido' => 'required|string',
        'categoria' => 'required|exists:categorias,idCategoria',
    ]);

    $articulo = new Articulo();
    $articulo->titulo = $request->titulo;
    $articulo->contenido = $request->contenido;
    $articulo->fechaPublicacion = now(); // Fecha actual
    $articulo->autor = auth()->id(); // Usuario autenticado
    $articulo->categoria = $request->categoria;
    $articulo->save();

    return redirect()->route('perfil')->with('success', 'Artículo agregado correctamente.');
}


    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'categoria' => 'required|exists:categorias,idCategoria',
        ]);

        $articulo->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('perfil')->with('success', 'Artículo actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->back()->with('success', 'Artículo eliminado correctamente.');
    }

}
