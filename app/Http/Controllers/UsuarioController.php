<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    
    // copiado de un github 
    // Mostrar formulario de registro
    public function showRegisterForm()
    {
        $suscripciones = Suscripcion::all();
        return view('auth.register', compact('suscripciones'));
    }

    // Registrar un nuevo usuario cambiamos contraseña por password
    public function register(Request $request)
    {
        try {
            Log::info('Datos recibidos en el registro:', $request->all());
    
            $request->validate([
                'nombre' => 'required|string|max:255',
                'correo' => 'required|email|unique:usuarios,correo',
                'password' => 'required|string|min:6',
                'idSuscripcion' => 'required|exists:suscripciones,idSuscripcion',
            ]);
    
            Log::info('Validación completada.');
    
            $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'correo' => $request->correo,
                'password' => Hash::make($request->password),
                'idSuscripcion' => $request->idSuscripcion,
            ]);
    
            Log::info('Usuario creado:', $usuario->toArray());
    
            return redirect()->route('login.form')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
        } catch (\Exception $e) {
            Log::error('Error al registrar usuario:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Ocurrió un error al registrar el usuario.']);
        }
    }
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Manejar el inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|string',
        ]);
    
        if (auth()->attempt(['correo' => $request->correo, 'password' => $request->password])) {
            return redirect()->route('perfil')->with('success', 'Inicio de sesión exitoso.');
        }
    
        return back()->withErrors(['password' => 'La contraseña ingresada es incorrecta.']);
    }
    // Cerrar sesión
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.form')->with('success', 'Sesión cerrada.');
    }
    
    // PERFIL DE USUARIO  

    public function perfil()
    {
        $usuario = auth()->user();
    
        if (!$usuario) {
            return redirect()->route('login.form')->with('error', 'Debes iniciar sesión para acceder al perfil.');
        }
    
        $suscripciones = \App\Models\Suscripcion::all();
        $categorias = \App\Models\Categoria::all();
        $articulos = \App\Models\Articulo::where('autor', $usuario->idUsuario)->get();
    
        return view('usuarios.perfil', compact('usuario', 'suscripciones', 'categorias', 'articulos'));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


      /**
     * ACTUALIZO LOS DATOS PERO NO ENCUENTRO COMO RECARGAR O UN REFRESH CON LOS NUEVO SOLO SALIENDO Y ENTRANDO CAMBIAR.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo,' . $id . ',idUsuario',
            'idSuscripcion' => 'required|exists:suscripciones,idSuscripcion',
        ]);
    
        // Actualizar los datos del usuario
        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'idSuscripcion' => $request->idSuscripcion,
        ]);
    
        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
