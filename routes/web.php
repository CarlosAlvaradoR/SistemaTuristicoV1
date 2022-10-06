<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPaquetes;

Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('paquetes_publico.inicio');
})->name('inicio');

Route::get('/nosotros', function () {
    return view('paquetes_publico.inicio');
})->name('nosotros');

Route::get('/destinos', function () {
    return view('paquetes_publico.destinos');
})->name('destinos');

Route::get('/contacto', function () {
    return view('paquetes_publico.inicio');
})->name('contacto');

Route::get('/crear/role', function () {
    /*$role =Role::create(['name'=>'admin']);
$role =Role::create(['name'=>'cliente']);
*/
})->name('crearRole');

Route::get('/cliente/perfil', function () {
    return view('perfil_cliente.perfil_cliente');
})->name('cliente')->middleware('verified', 'auth');

// RUTAS PARA EL DASHBOARD

/** PARA EL INICIO */
Route::get('/iniciodashboard', function () {
    return view('iniciodashboard');
});

Route::get('/nuevosUsuarios', function () {
    return view('nuevosUsuarios');
});

Route::get('/permisosusers', function () {
    return view('permisosUsers');
});

Route::get('/organizaciones', function () {
    return view('organizacionesacemilasguia');
});




/** PARA LOS PQUETES */
Route::get('/paquete', function () {
    return view('paquetes_admin.index');
})->name('paquetes.index');
//Route::get('/paquete', ShowPaquetes::class)->name('dashboard');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
