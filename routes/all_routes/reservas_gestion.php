<?php

use Illuminate\Support\Facades\Route;

Route::get('/paquetes/reserva/{paquete}/Newcliente', [App\Http\Controllers\ReservasController::class, 'reservarCrearCliente'])->name('paquetes.reservar.crear_cliente')->middleware(['auth', 'verified', 'can:crear-editar-reservas']);
Route::get('/paquetes/reserva/condiciones-riesgos-justificacionMedica/{reserva}', [App\Http\Controllers\ReservasController::class, 'reservaCondicionesPuntualidad'])->name('paquetes.reservar.condiciones.puntualidad')->middleware(['auth', 'verified', 'can:crear-editar-reservas']);
Route::get('/paquetes/reserva/{slug}', [App\Http\Controllers\ReservasController::class, 'reservar'])->name('paquetes.reservar')->middleware(['auth', 'verified', 'can:crear-editar-reservas']);
Route::post('/paquetes/reserva/save', [App\Http\Controllers\ReservasController::class, 'guardarReserva'])->name('paquetes.reservar.save')->middleware(['auth', 'verified']);

Route::get('/mostrar-comprobante-de-pago/{pago}', [App\Http\Controllers\ReservasController::class, 'mostrarComprobante'])->name('mostrar.comprobante.reserva')->middleware(['auth', 'verified', 'can:crear-editar-reservas']);
Route::get('/delete/imagen', [App\Http\Controllers\ReservasController::class, 'deleteImage'])->name('reservas.delete')->middleware(['auth', 'verified']);


Route::get('/reservas', [App\Http\Controllers\ReservasController::class, 'mostrarReservas'])->name('reservas.index')->middleware(['auth', 'verified', 'can:ver-interfaz-de-reservas-generales']);
Route::get('/reserva/{reserva}/editar', [App\Http\Controllers\ReservasController::class, 'editarReserva'])->name('reservas.editar')->middleware(['auth', 'verified', 'can:crear-editar-reservas']);
Route::get('/reservas/pagos/{reserva}', [App\Http\Controllers\ReservasController::class, 'pagosRestantes'])->name('reservas.pagos_restantes')->middleware(['auth', 'verified', 'can:ver-informacion-de-pagos']);
Route::get('/reservas/solicitudes-devolucion/{reserva}', [App\Http\Controllers\ReservasController::class, 'mostrarSolicitudes'])->name('reservas.solicitudes.devoluciones')->middleware(['auth', 'verified', 'can:llenar-solicitud-de-devolucion']);


Route::get('/solicitudes', [App\Http\Controllers\ReservasController::class, 'mostarTodasLasSolicitudes'])->name('solicitudes.all')->middleware(['auth', 'verified', 'can:ver-interfaz-de-solicitudes-generales']);
Route::get('/devoluciones', [App\Http\Controllers\ReservasController::class, 'mostrarDevoluciones'])->name('devoluciones.all')->middleware(['auth', 'verified', 'can:ver-interfaz-de-devoluciones-generales']);
Route::get('/reservas/criterios-medicos', [App\Http\Controllers\ReservasController::class, 'mostrarCriteriosMedicos'])->name('criterios_medicos.all')->middleware(['auth', 'verified', 'can:ver-crear-editar-eliminar-criterios-medicos']);

Route::get('/eventos-de-postergacion', [App\Http\Controllers\ReservasController::class, 'mostrarEventosPostergacion'])->name('eventos.postergacion.index')->middleware(['auth', 'verified', 'can:ver-crear-editar-eliminar-eventos-de-postergacion']);
Route::get('/tipo-de-pagos-cuentas', [App\Http\Controllers\ReservasController::class, 'mostrarTipoPagosCuentas'])->name('tipo.pagos.cuentas')->middleware(['auth', 'verified', 'can:ver-crear-editar-eliminar-tipos-de-pagos']);

Route::get('/consultar-reserva', [App\Http\Controllers\ReservasController::class, 'consultaReservas'])->name('consultar.reservas')->middleware(['auth', 'verified', 'can:crear-editar-reservas']);

Route::get('/reservas/reportes-generales', [App\Http\Controllers\ReservasController::class, 'reportesGenerales'])->name('reservas.reportes.generales')->middleware(['auth', 'verified', 'can:ver-reportes-en general-de-reservas']);

Route::get('/reservas/comprobante/{reserva}', [App\Http\Controllers\ReservasController::class, 'comprobante'])->name('reservas.comprobante')->middleware(['auth', 'verified']);


Route::get('/reservas/politicas-de-cumplimiento-de-reserva', [App\Http\Controllers\ReservasController::class, 'mostrarPoliticas'])->name('reservas.politicas.de.cumplimiento')->middleware(['auth', 'verified', 'can:ver-crear-editar-eliminar-politica-de-cumplimiento-de-reserva']);
Route::get('/reservas/comprobantes-entregados', [App\Http\Controllers\ReservasController::class, 'mostrarComprobantesEntregados'])->name('reservas.comprobantes.entregados')->middleware(['auth', 'verified', 'can:ver-y-manipular-comprobantes']);


//Route::get('/storage/autorizaciones/{reserva}', [App\Http\Controllers\ReservasController::class, 'archivo'])->name('reservas.comprobante')->middleware(['auth', 'verified']);





/** REPORTES */
Route::post('/reservas/reportes-generales/{fechaInicial?}/{FechaFinal?}/{Tipo?}', [App\Http\Controllers\ReservasController::class, 'reportReserva'])->name('reservas.reporte.info.reservas')->middleware(['auth', 'verified', 'can:ver-reportes-en general-de-reservas']);
Route::post('/reservas/reportes-generales/pago', [App\Http\Controllers\ReservasController::class, 'reportPagosReserva'])->name('reservas.reporte.pagos.reservas')->middleware(['auth', 'verified', 'can:ver-reportes-en general-de-reservas']);
//Route::get('/reservas/comprobante', [App\Http\Controllers\ReservasController::class, 'reportComprobante'])->name('consultar.reporte.comprobante')->middleware(['auth', 'verified']);
Route::get('/solicitudes/reporte-solicitudes', [App\Http\Controllers\ReservasController::class, 'reportSolicitudes'])->name('consultar.reporte.solicitudes')->middleware(['auth', 'verified', 'can:ver-reportes-en general-de-reservas']);
Route::get('/solicitud/reserva/{reserva}', [App\Http\Controllers\ReservasController::class, 'reportSolicitudesRealizadas'])->name('reporte.de.solicitud')->middleware(['auth', 'verified', 'can:ver-reportes-en general-de-reservas']);
//Route::get('/correo', [App\Http\Controllers\ReservasController::class, 'correo'])->name('correo')->middleware(['auth', 'verified']);
