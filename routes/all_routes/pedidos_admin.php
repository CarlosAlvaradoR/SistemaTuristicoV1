<?php

use Illuminate\Support\Facades\Route;


Route::get('/pedidos/proveedores', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerProveedores'])->name('pedidos.proveedores.index')->middleware(['auth', 'verified', 'can:ver-interfaz-de-proveedores']);
Route::get('/pedidos/proveedores/{proveedor}/cuentas-bancarias', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerCuentasBancarias'])->name('pedidos.proveedores.cuentasbancarias')->middleware(['auth', 'verified', 'can:añadir-cuentas-bancarias']);
Route::get('/pedidos/pedidos-generales', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerPedidosGenerales'])->name('pedidos.proveedores.general')->middleware(['auth', 'verified', 'can:ver-interfaz-de-pedidos-generales']);//
Route::get('/pedidos/pedidos-generales/{pedido}/detalles', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerPedidosGeneralesDetalleComponentes'])->name('pedidos.proveedores.general.detalle.componentes')->middleware(['auth', 'verified']);
Route::get('/pedidos/pedidos-generales/{proveedor}/{pedido}', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerPedidosGeneralesDetalle'])->name('pedidos.proveedores.general.detalle')->middleware(['auth', 'verified']);
Route::get('/pedidos/proveedores/{proveedor}/realizar-pedido', [App\Http\Controllers\PaquetesTuristicosController::class, 'RealizarPedido'])->name('pedidos.proveedores.formulario.pedidos')->middleware(['auth', 'verified', 'can:crear-pedidos-de-proveedores']);
Route::get('/pedidos/proveedor/santa-rosa/detalle', [App\Http\Controllers\PaquetesTuristicosController::class, 'detallePedido'])->name('detalle.pedidos')->middleware(['auth', 'verified']);
Route::get('/pedidos/entidades-financieras', [App\Http\Controllers\PaquetesTuristicosController::class, 'mostrarBancos'])->name('mostrar.bancos')->middleware(['auth', 'verified', 'can:ver-interfaz-de-entidades-financieras']);
Route::get('/pedidos/tipos-de-comprobante', [App\Http\Controllers\PaquetesTuristicosController::class, 'mostrarTiposDeComprobante'])->name('mostrar.tipos.de.comprobante')->middleware(['auth', 'verified', 'can:ver-crear-editar-tipos-de-comprobante']);
Route::get('/pedidos/ver-comprobante/{pago_proveedores}', [App\Http\Controllers\PedidosController::class, 'mostrarComprobante'])->name('mostrar.comprobantes-pagados.por.pedido')->middleware(['auth', 'verified']);

Route::get('/pedidos/ver-comprobante-de-pago/{archivo}', [App\Http\Controllers\PedidosController::class, 'mostrarArchivoComprobante'])->name('mostrar.archivo.comprobante')->middleware(['auth', 'verified']);
