<?php

use Illuminate\Support\Facades\Route;

Route::get('/paquetes/reserva/Newcliente', [App\Http\Controllers\ReservasController::class, 'reservarCrearCliente'])->name('paquetes.reservar.crear_cliente')->middleware(['auth', 'verified']);
Route::get('/paquetes/reserva/condiciones_riesgos/{reserva}', [App\Http\Controllers\ReservasController::class, 'reservaCondicionesPuntualidad'])->name('paquetes.reservar.condiciones.puntualidad')->middleware(['auth', 'verified']);
Route::get('/paquetes/reserva/{slug}', [App\Http\Controllers\ReservasController::class, 'reservar'])->name('paquetes.reservar')->middleware(['auth', 'verified']);
Route::post('/paquetes/reserva/save', [App\Http\Controllers\ReservasController::class, 'guardarReserva'])->name('paquetes.reservar.save')->middleware(['auth', 'verified']);



Route::get('/reservas', [App\Http\Controllers\ReservasController::class, 'mostrarReservas'])->name('reservas.index')->middleware(['auth', 'verified']);
Route::get('/reservas/eventos-postergacion', [App\Http\Controllers\ReservasController::class, 'mostrarEventosPostergacionReservas'])->name('reservas.eventos.postergacion')->middleware(['auth', 'verified']);
Route::get('/reservas/solicitudes-devolucion', [App\Http\Controllers\ReservasController::class, 'mostrarSolicitudes'])->name('reservas.solicitudes.devoluciones')->middleware(['auth', 'verified']);
