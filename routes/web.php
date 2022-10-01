<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('iniciodashboard');
});





// RUTAS PARA EL DASHBOARD

/** PARA EL INICIO */
Route::get('/iniciodashboard', function () {
    return view('iniciodashboard');
});
/** PARA EL NUEVOS USUARIOS */
Route::get('/nuevosUsuarios', function () {
    return view('nuevosUsuarios');
});
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
