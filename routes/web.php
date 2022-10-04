<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('paquetes_publico.inicio');
});

Route::get('/nosotros', function () {
    return view('paquetes_publico.inicio');
});

Route::get('/destinos', function () {
    return view('paquetes_publico.inicio');
});

Route::get('/contacto', function () {
    return view('paquetes_publico.inicio');
});

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
    return view('paqueteturistico');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
