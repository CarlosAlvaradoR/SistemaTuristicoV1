<?php

use Illuminate\Support\Facades\Route;

Route::get('/paquetes/reserva/{paquete}/Newcliente', [App\Http\Controllers\ReservasController::class, 'reservarCrearCliente'])->name('paquetes.reservar.crear_cliente')->middleware(['auth', 'verified']);
Route::get('/paquetes/reserva/condiciones-riesgos-justificacionMedica/{reserva}', [App\Http\Controllers\ReservasController::class, 'reservaCondicionesPuntualidad'])->name('paquetes.reservar.condiciones.puntualidad')->middleware(['auth', 'verified']);
Route::get('/paquetes/reserva/{slug}', [App\Http\Controllers\ReservasController::class, 'reservar'])->name('paquetes.reservar')->middleware(['auth', 'verified']);
Route::post('/paquetes/reserva/save', [App\Http\Controllers\ReservasController::class, 'guardarReserva'])->name('paquetes.reservar.save')->middleware(['auth', 'verified']);



Route::get('/reservas', [App\Http\Controllers\ReservasController::class, 'mostrarReservas'])->name('reservas.index')->middleware(['auth', 'verified']);
Route::get('/reservas/pagos/{reserva}', [App\Http\Controllers\ReservasController::class, 'pagosRestantes'])->name('reservas.pagos_restantes')->middleware(['auth', 'verified']);
Route::get('/reservas/solicitudes-devolucion/{reserva}', [App\Http\Controllers\ReservasController::class, 'mostrarSolicitudes'])->name('reservas.solicitudes.devoluciones')->middleware(['auth', 'verified']);

Route::get('/solicitudes', [App\Http\Controllers\ReservasController::class, 'mostarTodasLasSolicitudes'])->name('solicitudes.all')->middleware(['auth', 'verified']);
Route::get('/devoluciones', [App\Http\Controllers\ReservasController::class, 'mostrarDevoluciones'])->name('devoluciones.all')->middleware(['auth', 'verified']);
Route::get('/reservas/criterios-medicos', [App\Http\Controllers\ReservasController::class, 'mostrarCriteriosMedicos'])->name('criterios_medicos.all')->middleware(['auth', 'verified']);

Route::get('/eventos-de-postergacion', [App\Http\Controllers\ReservasController::class, 'mostrarEventosPostergacion'])->name('eventos.postergacion.index')->middleware(['auth', 'verified']);
Route::get('/tipo-de-pagos-cuentas', [App\Http\Controllers\ReservasController::class, 'mostrarTipoPagosCuentas'])->name('tipo.pagos.cuentas')->middleware(['auth', 'verified']);

Route::get('/consultar-reserva', [App\Http\Controllers\ReservasController::class, 'consultaReservas'])->name('consultar.reservas')->middleware(['auth', 'verified']);

Route::get('/reservas/reportes-generales', [App\Http\Controllers\ReservasController::class, 'reportesGenerales'])->name('reservas.reportes.generales')->middleware(['auth', 'verified']);

Route::get('/reservas/comprobante/{reserva}', [App\Http\Controllers\ReservasController::class, 'comprobante'])->name('reservas.comprobante')->middleware(['auth', 'verified']);





/** REPORTES */
Route::post('/reservas/reportes-generales/{fechaInicial?}/{FechaFinal?}/{Tipo?}', [App\Http\Controllers\ReservasController::class, 'reportReserva'])->name('reservas.reporte.info.reservas')->middleware(['auth', 'verified']);
Route::post('/reservas/reportes-generales/pago', [App\Http\Controllers\ReservasController::class, 'reportPagosReserva'])->name('reservas.reporte.pagos.reservas')->middleware(['auth', 'verified']);
//Route::get('/reservas/comprobante', [App\Http\Controllers\ReservasController::class, 'reportComprobante'])->name('consultar.reporte.comprobante')->middleware(['auth', 'verified']);
Route::get('/solicitudes/reporte-solicitudes', [App\Http\Controllers\ReservasController::class, 'reportSolicitudes'])->name('consultar.reporte.solicitudes')->middleware(['auth', 'verified']);
Route::get('/solicitud/reserva/{reserva}', [App\Http\Controllers\ReservasController::class, 'reportSolicitudesRealizadas'])->name('reporte.de.solicitud')->middleware(['auth', 'verified']);
