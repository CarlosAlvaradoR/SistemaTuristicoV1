<?php

use Illuminate\Support\Facades\Route;

Route::get('/paquetes/reserva/Newcliente', [App\Http\Controllers\ReservasController::class, 'reservarCrearCliente'])->name('paquetes.reservar.crear_cliente')->middleware(['auth', 'verified']);
Route::get('/paquetes/reserva/condiciones_riesgos/{reserva}', [App\Http\Controllers\ReservasController::class, 'reservaCondicionesPuntualidad'])->name('paquetes.reservar.condiciones.puntualidad')->middleware(['auth', 'verified']);
Route::get('/paquetes/reserva/{slug}', [App\Http\Controllers\ReservasController::class, 'reservar'])->name('paquetes.reservar')->middleware(['auth', 'verified']);
Route::post('/paquetes/reserva/save', [App\Http\Controllers\ReservasController::class, 'guardarReserva'])->name('paquetes.reservar.save')->middleware(['auth', 'verified']);



Route::get('/reservas', [App\Http\Controllers\ReservasController::class, 'mostrarReservas'])->name('reservas.index')->middleware(['auth', 'verified']);
Route::get('/reservas/pagos/{reserva}', [App\Http\Controllers\ReservasController::class, 'pagosRestantes'])->name('reservas.pagos_restantes')->middleware(['auth', 'verified']);
Route::get('/reservas/solicitudes-devolucion/{reserva}', [App\Http\Controllers\ReservasController::class, 'mostrarSolicitudes'])->name('reservas.solicitudes.devoluciones')->middleware(['auth', 'verified']);

Route::get('/solicitudes', [App\Http\Controllers\ReservasController::class, 'mostarTodasLasSolicitudes'])->name('solicitudes.all')->middleware(['auth', 'verified']);

Route::get('/eventos-de-postergacion', [App\Http\Controllers\ReservasController::class, 'mostrarEventosPostergacion'])->name('eventos.postergacion.index')->middleware(['auth', 'verified']);
Route::get('/tipo-de-pagos-cuentas', [App\Http\Controllers\ReservasController::class, 'mostrarTipoPagosCuentas'])->name('tipo.pagos.cuentas')->middleware(['auth', 'verified']);

Route::get('/consultar-reserva', [App\Http\Controllers\ReservasController::class, 'consultaReservas'])->name('consultar.reservas')->middleware(['auth', 'verified']);

