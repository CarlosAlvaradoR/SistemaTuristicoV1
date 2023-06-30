<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPaquetes;

Route::get('/paquetes', [App\Http\Controllers\PaquetesTuristicosController::class, 'index'])->name('paquetes.index')->middleware(['auth', 'verified', 'can:ver-interfaz-de-paquetes-turisticos']);
Route::get('/paquetes/crear', [App\Http\Controllers\PaquetesTuristicosController::class, 'create'])->name('paquetes.create')->middleware(['auth', 'verified', 'can:crear-paquetes-turisticos']);
Route::get('/paquetes/editar/{slug}', [App\Http\Controllers\PaquetesTuristicosController::class, 'edit'])->name('paquetes.edit')->middleware(['auth', 'verified', 'can:editar-paquetes-turisticos']);
Route::get('/paquetes/detalle/{slug}', [App\Http\Controllers\PaquetesTuristicosController::class, 'show'])->name('paquetes.detalle')->middleware(['auth', 'verified', 'can:ver-manipular-componentes-de-paquetes-turisticos']);

Route::get('/paquetes/lugares-atractivos', [App\Http\Controllers\PaquetesTuristicosController::class, 'lugares_atractivos'])->name('paquetes.lugares_atractivos')->middleware(['auth', 'verified', 'can:crear-editar-eliminar-atractivos-de-paquetes-turisticos']);
Route::get('/paquetes/tipos-de-personal', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_personal'])->name('paquetes.tipos_personal')->middleware(['auth', 'verified', 'can:crear-editar-eliminar-tipos-de-personal-de-paquetes-turisticos']);
Route::get('/paquetes/tipos-de-transporte', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_transporte'])->name('paquetes.tipos_transporte')->middleware(['auth', 'verified', 'can:crear-editar-eliminar-tipos-de-transporte-de-paquetes-turisticos']);
Route::get('/paquetes/tipos-de-alimentacion', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_alimentacion'])->name('paquetes.tipos_alimentacion')->middleware(['auth', 'verified', 'can:crear-editar-eliminar-tipos-de-alimentacion-de-paquetes-turisticos']);
Route::get('/paquetes/tipos-de-acemilas', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_acemilas'])->name('paquetes.tipos_acemilas')->middleware(['auth', 'verified', 'can:crear-editar-eliminar-tipos-de-acemilas-de-paquetes-turisticos']);
Route::get('/paquetes/tipos-de-almuerzos', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_almuerzos'])->name('paquetes.tipos_almuerzos')->middleware(['auth', 'verified', 'can:crear-editar-eliminar-tipos-de-almuerzos-de-paquetes-turisticos']);
Route::get('/paquetes/tipos-de-paquetes-turisticos', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipoPaquetesTuristicos'])->name('paquetes.tipo_paquetes_turisticos')->middleware(['auth', 'verified', 'can:crear-editar-eliminar-tipos-de-paquetes-turisticos']);

/** REPORTES */
Route::get('/paquetes/reporte-de-itinerarios/{paquete}', [App\Http\Controllers\PaquetesTuristicosController::class, 'mostrarReporteDeItinerarios'])->name('mostrar.reporte.de.itinerarios')->middleware(['auth', 'verified', 'can:ver-manipular-componentes-de-paquetes-turisticos']);
