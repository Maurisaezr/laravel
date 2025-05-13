<?php
//importo los datos 

use Illuminate\Support\Facades\Route;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ArticuloController2;

Route::get('/', function () {
    $articulosGenerales = Articulo::where('categoria', 7)->get(); // Artículos de la categoría "Generales"
    $articulosEmprendimiento = Articulo::where('categoria', 8)->get(); // Artículos de la categoría "Emprendimiento"
    $articulosDeportes = Articulo::where('categoria', 6)->get(); // Artículos de la categoría "Deportes"
    $articulosMiembros = Articulo::where('autor', '!=', 1)->with('categoria', 'autor')->get(); // Artículos publicados por miembros, excluyendo autor ID 1
    $usuarios = \App\Models\Usuario::all(); // Todos los usuarios
    $categorias = Categoria::all(); // Todas las categorías

    return view('index', compact('articulosGenerales', 'articulosEmprendimiento', 'articulosDeportes', 'articulosMiembros', 'usuarios', 'categorias'));
});
// aca pasa los metodos http y sus respectivas rutas si es GET  envia datos por la propia url  y post por debajo 
Route::get('/articulos/create', [ArticuloController::class, 'create'])->name('articulos.create');

Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');

Route::post('/articulos', [ArticuloController::class, 'store'])->name('articulos.store');

//Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/articulos-preparados', [ArticuloController2::class, 'getArticulos']);

Route::resource('categorias', CategoriaController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('articulos', ArticuloController::class);

Route::resource('suscripcions', SuscripcionController::class);

Route::resource('suscripcions', ContactController::class);


//llamo al controlador de contacto para almacenar los datos SE NOTA EL METODO POST
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');




// RUTAS PARA LOGIN  Y REGISTER 


//Route::get('/register', [UsuarioController::class, 'showRegisterForm'])->name('register.form');
//Route::post('/register', [UsuarioController::class, 'register'])->name('register');

//Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login.form');
//Route::post('/login', [UsuarioController::class, 'login'])->name('login');

//Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
Route::get('/register', [UsuarioController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [UsuarioController::class, 'register'])->name('register');

Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UsuarioController::class, 'login'])->name('login');

Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');



Route::resource('articulos', ArticuloController::class);
// segun l que lei protege las rutas del perfil y acciones para que solo los usuarios logueados puedan acceder a ellas
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');
    Route::resource('articulos', ArticuloController::class);
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
});
