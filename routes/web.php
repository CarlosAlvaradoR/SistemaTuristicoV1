<?php

use Illuminate\Support\Facades\Route;
use App\Models\Personas;
use App\Models\Tipo_usuarios;
use App\Models\Usuarios;
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
Route::get('/newuser', [PersonasController::class, 'index'])->name('usuarios.nuevos');
/** PARA LOS PERMISOS DE LOS USUARIOS */
Route::get('/permisosusers', function () {
    return view('permisosUsers');
});
/** ORGANIZACIONES - ACÉMILAS - GUÍA */
Route::get('/organizaciones', function () {
    return view('organizacionesacemilasguia');
});




/** PARA LOS PQUETES */
Route::get('/paquete', function () {
    return view('paqueteturistico');
});



Route::get('/muestrausers', function () {
    $datos= Tipo_usuarios::all();
    return $datos;
});


