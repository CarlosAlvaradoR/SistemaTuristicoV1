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
Route::get('/paquete/{paquete}/viajes/{viaje}/actividades/{actividad}/participantes', [App\Http\Controllers\ViajePaquetesController::class, 'viajeActividadesAclimatacionParticipantes'])->name('paquete.viajes.actividades_aclimatacion.participantes')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/hospedaje', [App\Http\Controllers\ViajePaquetesController::class, 'viajeHospedajes'])->name('paquete.viajes.hospedaje')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/itinerario', [App\Http\Controllers\ViajePaquetesController::class, 'viajeItinerarios'])->name('paquete.viajes.itinerario')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/arriero', [App\Http\Controllers\ViajePaquetesController::class, 'viajeArrieros'])->name('paquete.viajes.arriero')->middleware(['auth', 'verified']);

