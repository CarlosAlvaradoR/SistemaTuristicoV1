<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Personas;
use App\Models\Tipo_usuarios;
use App\Models\Usuarios;



use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PersonasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('/', [PersonasController::class, 'index'])->name('personas.index');
Route::get('/create', [PersonasController::class, 'create'])->name('personas.create');
Route::get('/edit', [PersonasController::class, 'edit'])->name('personas.edit');
|
*/

Route::get('/', function () {
    return view('iniciodashboard');
});





// RUTAS PARA EL DASHBOARD

/** PARA EL INICIO */
Route::get('/iniciodashboard', function () {
    return view('iniciodashboard');
});



/** PARA EL NUEVOS USUARIOS */
Route::get('/newuser', [UsuariosController::class, 'mostrarFormularioRegistro'])->name('usuarios.nuevos');
Route::post('/newuser/create', [PersonasController::class, 'store'])->name('usuarios.create');

/** PARA LOS PERMISOS DE LOS USUARIOS */
Route::get('/users', [UsuariosController::class, 'mostrarUsuariosPermisos'])->name('usuarios.permisos');

/** ORGANIZACIONES - ACÉMILAS - GUÍA */
Route::get('/organitations', [UsuariosController::class, 'mostrarTabsOrgaAceEquipo'])->name('organizaciones.acemilas.equipos');





/** PARA LOS PQUETES */
Route::get('/packages', [UsuariosController::class, 'mostrarPaquetesActivos'])->name('paquetes.activos.galeria');




Route::get('/muestrausers', function () {
    //$datos= Tipo_usuarios::all();
    $datos=DB::select('SELECT * FROM personas p
    INNER JOIN usuarios u on p.idpersona=u.idpersona');
    return $datos;
});


