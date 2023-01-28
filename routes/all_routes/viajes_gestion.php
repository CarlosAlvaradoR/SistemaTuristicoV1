<?php

use Illuminate\Support\Facades\Route;



Route::get('/paquete/name/viajes', function () {
    return view('viajes_admin.viajes_paquete');
})->name('paquete.viajes');

Route::get('/paquete/name/viajes/participantes', function () {
    return view('viajes_admin.viajes_participantes');
})->name('paquete.viajes.participantes');

Route::get('/paquete/name/viajes/traslados', function () {
    return view('viajes_admin.traslados_viaje');
})->name('paquete.viajes.traslados');