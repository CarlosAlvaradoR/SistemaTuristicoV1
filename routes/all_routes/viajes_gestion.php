<?php

use Illuminate\Support\Facades\Route;


Route::get('/paquete/{paquete}/viajes', [App\Http\Controllers\ViajePaquetesController::class, 'index'])->name('paquete.viajes')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/participantes', [App\Http\Controllers\ViajePaquetesController::class, 'viajeParticipantes'])->name('paquete.viajes.participantes')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/participantes/entrega-de-equipos/{participante}', [App\Http\Controllers\ViajePaquetesController::class, 'EntregaDeEquipos'])->name('paquete.viajes.participantes.entregaEquipos')->middleware(['auth', 'verified']);


Route::get('/paquete/{paquete}/viajes/{viaje}/traslados', [App\Http\Controllers\ViajePaquetesController::class, 'trasladoViajes'])->name('paquete.viajes.traslados')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/almuerzos', [App\Http\Controllers\ViajePaquetesController::class, 'viajeAlmuerzos'])->name('paquete.viajes.almuerzos')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/boletas-de-pago', [App\Http\Controllers\ViajePaquetesController::class, 'viajeBoletasPago'])->name('paquete.viajes.boletas_pago')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/actividades-de-aclimatacion', [App\Http\Controllers\ViajePaquetesController::class, 'viajeActividadesAclimatacion'])->name('paquete.viajes.actividades_aclimatacion')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/actividades/{actividad}/participantes', [App\Http\Controllers\ViajePaquetesController::class, 'viajeActividadesAclimatacionParticipantes'])->name('paquete.viajes.actividades_aclimatacion.participantes')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/hospedaje', [App\Http\Controllers\ViajePaquetesController::class, 'viajeHospedajes'])->name('paquete.viajes.hospedaje')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/itinerario', [App\Http\Controllers\ViajePaquetesController::class, 'viajeItinerarios'])->name('paquete.viajes.itinerario')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/arriero', [App\Http\Controllers\ViajePaquetesController::class, 'viajeArrieros'])->name('paquete.viajes.arriero')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/cocineros', [App\Http\Controllers\ViajePaquetesController::class, 'viajeCocineros'])->name('paquete.viajes.cocineros')->middleware(['auth', 'verified']);
Route::get('/paquete/{paquete}/viajes/{viaje}/guias', [App\Http\Controllers\ViajePaquetesController::class, 'viajeGuias'])->name('paquete.viajes.guias')->middleware(['auth', 'verified']);
Route::get('/viajes/ver-todo', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarTodosLosViajes'])->name('viajes.ver_todo')->middleware(['auth', 'verified']);
Route::get('/viajes/empresas-transporte', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarEmpresasTransporte'])->name('viajes.empresas_transporte')->middleware(['auth', 'verified']);
Route::get('/viajes/empresas-transporte/{empresa}/vehiculo', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarVehiculosEmpresasTransporte'])->name('viajes.empresas_transporte.vehiculos')->middleware(['auth', 'verified']);



Route::get('/viajes/chofer', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarListaChoferes'])->name('viajes.chofer')->middleware(['auth', 'verified']);
Route::get('/viajes/cocinero', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarListaCocineros'])->name('viajes.cocinero')->middleware(['auth', 'verified']);
Route::get('/viajes/guia', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarListaGuias'])->name('viajes.guia')->middleware(['auth', 'verified']);
Route::get('/viajes/arriero', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarArrieros'])->name('viajes.arriero')->middleware(['auth', 'verified']);



Route::get('/viajes/tipos-de-vehiculos', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarTiposDeVehiculos'])->name('viajes.tipos.de.vehiculos')->middleware(['auth', 'verified']);
Route::get('/viajes/tipos-de-licencias', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarTiposDeLicencias'])->name('viajes.tipos.de.licencias')->middleware(['auth', 'verified']);
Route::get('/viajes/asociaciones', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarAsociaciones'])->name('viajes.mostrar.asociaciones')->middleware(['auth', 'verified']);
Route::get('/viajes/hoteles', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarHoteles'])->name('viajes.mostrar.hoteles')->middleware(['auth', 'verified']);


/** REPORTES */
Route::get('/viajes/reporte/viajes-actuales', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarViajesActuales'])->name('mostrar.viajes.actuales')->middleware(['auth', 'verified']);
Route::get('/viajes/reporte/{paquete}/{viaje}/participantes-del-viaje', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarParticipantesDelViaje'])->name('mostrar.participantesDelViaje')->middleware(['auth', 'verified']);
Route::get('/viajes/reporte/{paquete}/{viaje}/itinerario-cumplido', [App\Http\Controllers\ViajePaquetesController::class, 'mostrarItinerariosCumplidos'])->name('mostrar.viajes.itinerarios.cumplidos')->middleware(['auth', 'verified']);
