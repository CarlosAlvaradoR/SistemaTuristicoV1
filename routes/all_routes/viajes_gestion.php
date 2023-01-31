<?php

use Illuminate\Support\Facades\Route;


Route::get('/paquete/{paquete}/viajes', [App\Http\Controllers\ViajePaquetesController::class, 'index'])->name('paquete.viajes')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/participantes', [App\Http\Controllers\ViajePaquetesController::class, 'viajeParticipantes'])->name('paquete.viajes.participantes')->middleware(['auth', 'verified']);


Route::get('/paquete/name/viajes/traslados', function () {
    return view('viajes_admin.traslados_viaje');
})->name('paquete.viajes.traslados');

Route::get('/paquete/{paquete}/viajes/{viaje}/almuerzos', [App\Http\Controllers\ViajePaquetesController::class, 'viajeAlmuerzos'])->name('paquete.viajes.almuerzos')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/boletas-de-pago', [App\Http\Controllers\ViajePaquetesController::class, 'viajeBoletasPago'])->name('paquete.viajes.boletas_pago')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/actividades-de-aclimatacion', [App\Http\Controllers\ViajePaquetesController::class, 'viajeActividadesAclimatacion'])->name('paquete.viajes.actividades_aclimatacion')->middleware(['auth', 'verified']);


Route::get('/paquete/name/viajes/actividades/participants', function () {
    return view('viajes_admin.viajes_actividades_aclimatacion_participantes');
})->name('paquete.viajes.actividades_aclimatacion.participantes');

Route::get('/paquete/name/viajes/hospedaje', function () {
    return view('viajes_admin.viajes_hospedajes');
})->name('paquete.viajes.hospedaje');

Route::get('/paquete/name/viajes/itinerario/x/u', function () {
    return view('viajes_admin.viajes_itinerarios_cumplidos');
})->name('paquete.viajes.itinerario');

Route::get('/paquete/name/viajes/arriero-guia-cocinero', function () {
    return view('viajes_admin.viajes_arrieros-guia_cocinero');
})->name('paquete.viajes.arriero');