<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Personas;
use App\Models\Tipo_usuarios;
use App\Models\Usuarios;




use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\PaquetesTuristicosController;
use App\Http\Controllers\FotogaleriasController;
use App\Http\Controllers\MapasreferencialesController;
use App\Http\Controllers\TipopaquetesController;
use App\Http\Controllers\ActividadesitinerariosController;
use App\Http\Controllers\PagosserviciosController;
use App\Http\Controllers\CategoriashotelesController;
use App\Http\Controllers\PaquetesTipospersonalesController;
use App\Http\Controllers\PaquetesTipotransportesController;
use App\Http\Controllers\PaquetesTipoalimentacionesController;
use App\Http\Controllers\PaquetesEquiposController;
use App\Http\Controllers\PaquetesAcemilasController;
use App\Http\Controllers\PaquetesTipoalmuerzosController;
use App\Http\Controllers\PaquetesVisitaatractivosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ViajesPaquetesController;
use App\Http\Controllers\ReservasController;    
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EmpresastransportesController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\ChoferesController;    
use App\Http\Controllers\GuiasController;   
use App\Http\Controllers\CocinerosController;
use App\Http\Controllers\ArrierosController;
use App\Http\Controllers\AsociacionesController;    
use App\Http\Controllers\TrasladoViajesController;    

Route::get('/reportes', function () {
    return view('paquetes/reportes/index');
});//->middleware('auth');



//**************************************************************** */
//RUTAS PARA EL LANDING
Route::get('/', [UsuariosController::class, 'mostrarinicio'])->name('inicio.landing');//->middleware('auth');//Inicio
Route::get('/about', [UsuariosController::class, 'mostrarabout'])->name('about.landing');//->middleware('auth');//Inicio 
Route::get('/destination', [PaquetesTuristicosController::class, 'mostrarDestinos'])->name('destination.landing');//->middleware('auth');//Mostrar Destinos
Route::get('/destination/{slug}', [PaquetesTuristicosController::class, 'mostrarDetallePaquete'])->name('destination.landing.details');//->middleware('auth');//Mostrar Detalles Destino Seleccionado
Route::get('/contact', [UsuariosController::class, 'mostrarContacto'])->name('contact.landing');//->middleware('auth');//Mostrar Contacto
Route::get('/account', [UsuariosController::class, 'mostrarFormularioLogin'])->name('account.landing');//->middleware('auth');//Mostrar Formulario de Inicio de Sesion
//Route::get('/account', [UsuariosController::class, 'mostrarContacto'])->name('contact.landing')->middleware('auth');//Mostrar Formulario de nuevos Usuarios
//**************************************************************** */
Route::get('/prueba/{id}/{slug}', [PaquetesTuristicosController::class, 'prueba'])->name('prueba');//->middleware('auth');//Mostrar Formulario de Inicio de Sesion

Route::get('/reservar/paquete', [PaquetesTuristicosController::class, 'reservarExterno'])->name('reservar.cliente')->middleware('auth');//Mostrar Formulario de Inicio de Sesion


//PAYPAL
Route::get('/paypal/pay', [PaymentController::class, 'payWithPayPal'])->name('pagar');
Route::get('/paypal/status', [PaymentController::class, 'payPalStatus'])->name('status');

//Results
//Route::get('/results', [FacultadesController::class, 'results'])->name('results');
Route::get('/results', function () {
    return "Coorecto, su transacción se realizó de la mejor manera";
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


// RUTAS PARA EL DASHBOARD

/** PARA EL INICIO */
Route::get('/homedash', [UsuariosController::class, 'homedash'])->name('home.dashboard')->middleware('auth');




/** PARA EL NUEVOS USUARIOS */
Route::get('/newuser', [UsuariosController::class, 'mostrarFormularioRegistro'])->name('usuarios.nuevos')->middleware('auth');
Route::post('/newuser/create', [PersonasController::class, 'store'])->name('usuarios.create')->middleware('auth');

/** PARA LOS PERMISOS DE LOS USUARIOS */
Route::get('/users', [UsuariosController::class, 'mostrarUsuariosPermisos'])->name('usuarios.permisos')->middleware('auth');

/** ORGANIZACIONES - ACÉMILAS - GUÍA */
Route::get('/organitations', [UsuariosController::class, 'mostrarTabsOrgaAceEquipo'])->name('organizaciones.acemilas.equipos')->middleware('auth');





/** PARA LOS PAQUETES */
Route::get('/packages', [PaquetesTuristicosController::class, 'index'])->name('paquetes.activos.galeria')->middleware('auth');
Route::get('/packages/create', [PaquetesTuristicosController::class, 'create'])->name('paquetes.formulario.nuevo')->middleware('auth');
Route::get('/packages/{slug}/edit', [PaquetesTuristicosController::class, 'edit'])->name('paquetes.editar')->middleware('auth');//Para agregar rutas a los paquetes
Route::put('/packages/update/{id}', [PaquetesTuristicosController::class, 'update'])->name('paquetes.update')->middleware('auth');//Para agregar rutas a los paquetes
Route::post('/pakcages/store', [PaquetesTuristicosController::class, 'store'])->name('paquetes.turisticos.creacion')->middleware('auth');//CREAR Guardar NUEVOS PAQUETES
Route::get('/packages/details/{idpaqueteturistico}', [PaquetesTuristicosController::class, 'detallepaquetes'])->name('paquetes.detalles')->middleware('auth');//MUESTRA LOS paquetes en el bucle

//Mapas
Route::get('/packages/details/newMap/{id}', [PaquetesTuristicosController::class, 'formularioNuevoMapa'])->name('paquetes.detalles.nuevo.paquetes')->middleware('auth');//MUESTRA LOS paquetes en el bucle
Route::post('/packages/details/newMap/save', [MapasreferencialesController::class, 'store'])->name('paquetes.detalles.guardar.mapas')->middleware('auth');//Para agregar rutas a los paquetes
Route::get('/packages/details/newMap/edit/{id}', [MapasreferencialesController::class, 'edit'])->name('paquetes.detalles.editar.mapas')->middleware('auth');//Para agregar rutas a los paquetes
Route::put('/packages/details/newMap/update/{id}', [MapasreferencialesController::class, 'update'])->name('paquetes.detalles.actualizar.mapas')->middleware('auth');//Para agregar rutas a los paquetes
Route::get('/mostrarData', [PaquetesTuristicosController::class, 'index'])->name('paquetes.index')->middleware('auth')->middleware('auth');
Route::delete('/package/details/newMap/delete/{idactividad}', [MapasreferencialesController::class, 'destroy'])->name('eliminar.mapa.paquete')->middleware('auth');

//FotoGalerías
Route::get('/package/details/create/gallery/{idpaquete}', [FotogaleriasController::class, 'index'])->name('foto.nuevas.galerias')->middleware('auth');//CREAR Guardar NUEVOS PAQUETES
Route::post('/package/details/create/gallery/create', [FotogaleriasController::class, 'store'])->name('paquetes.turisticos.creacion.galeria')->middleware('auth');//CREAR Guardar NUEVOS PAQUETES
Route::get('/package/details/edit/{id}', [FotogaleriasController::class, 'edit'])->name('paquetes.turisticos.edicion.galeria')->middleware('auth');//CREAR Guardar NUEVOS PAQUETES
Route::put('/package/details/edit/update/{id}', [FotogaleriasController::class, 'update'])->name('paquetes.turisticos.actualizar.galeria')->middleware('auth');//Para agregar rutas a los paquetes
Route::delete('/package/details/delete/{idactividad}', [FotogaleriasController::class, 'destroy'])->name('eliminar.galeria.paquete')->middleware('auth');

//Mapas
Route::get('/newMap', [PaquetesTuristicosController::class, 'formularioNuevoMapa'])->name('formulario.nuevo.mapa.paquete')->middleware('auth');//CREAR Guardar NUEVOS PAQUETES

//Tipos
Route::get('/types', [TipopaquetesController::class, 'index'])->name('index.tipo.paquete')->middleware('auth');//Nuevos tipos de paquetes
Route::get('/types/new', [TipopaquetesController::class, 'formularioNuevosTipos'])->name('formulario.nuevo.tipo.paquete')->middleware('auth');//Nuevos tipos de paquetes
Route::post('/types/save', [TipopaquetesController::class, 'store'])->name('formulario.guardar.tipo.paquete')->middleware('auth');//Nuevos tipos de paquetes
Route::get('/types/edit/{idpaquete}', [TipopaquetesController::class, 'edit'])->name('formulario.editar.tipo.paquete')->middleware('auth');//Nuevos tipos de paquetes
Route::put('/types/edit/save/{idpaquete}', [TipopaquetesController::class, 'update'])->name('formulario.editar.guardar.tipo.paquete')->middleware('auth');//Nuevos tipos de paquetes
Route::get('/types/delete/{idpaquete}', [TipopaquetesController::class, 'destroy'])->name('formulario.eliminar.tipo.paquete')->middleware('auth');//Nuevos tipos de paquetes

//Lugares a visitar
Route::get('/package/places/{idpaquete}', [PaquetesVisitaatractivosController::class, 'index'])->name('index.formulario.nuevo.atractivo')->middleware('auth');//Nuevos tipos de paquetes
Route::post('/package/places/save', [PaquetesVisitaatractivosController::class, 'store'])->name('guardar.atractivo.paquete')->middleware('auth');
Route::delete('/package/places/delete/{idAtractivo}', [PaquetesVisitaatractivosController::class, 'destroy'])->name('eliminar.atractivo.lugar.paquete')->middleware('auth');

//Itinerario
Route::get('/package/itinerary/{idpaquete}', [ActividadesitinerariosController::class, 'index'])->name('index.formulario.nuevo.itinerario')->middleware('auth');//Nuevos tipos de paquetes
Route::post('/package/itinerary/save', [ActividadesitinerariosController::class, 'store'])->name('guardar.itinerario.paquete')->middleware('auth');
Route::get('/package/itinerary/edit/{idactividad}', [ActividadesitinerariosController::class, 'edit'])->name('editar.itinerario.paquete')->middleware('auth');
Route::put('/package/itinerary/edit/{idactividad}', [ActividadesitinerariosController::class, 'update'])->name('update.itinerario.paquete')->middleware('auth');//Nuevos tipos de paquetes
Route::delete('/package/itinerary/delete/{idactividad}', [ActividadesitinerariosController::class, 'destroy'])->name('eliminar.itinerario.paquete')->middleware('auth');

//Servicios
Route::get('/package/details/services/{idpaquete}', [PagosserviciosController::class, 'index'])->name('index.formulario.nuevo.servicio')->middleware('auth');//Nuevos tipos de paquetes
Route::post('/package/details/save', [PagosserviciosController::class, 'store'])->name('guardar.servicio.paquete')->middleware('auth');
Route::get('/package/details/services/edit/{idactividad}', [PagosserviciosController::class, 'edit'])->name('editar.servicio.paquete')->middleware('auth');
Route::put('/package/details/services/edit/{idactividad}', [PagosserviciosController::class, 'update'])->name('update.servicio.paquete')->middleware('auth');
Route::delete('/package/details/services/delete/{idactividad}', [PagosserviciosController::class, 'destroy'])->name('eliminar.servicio.paquete')->middleware('auth');

//Categoría Hoteles
Route::get('/package/details/categoryHotel/{idpaquete}', [CategoriashotelesController::class, 'index'])->name('index.formulario.nueva.categoria.hotel.paquete')->middleware('auth');
Route::post('/package/details/categoryHotel/save', [CategoriashotelesController::class, 'store'])->name('guardar.categoria.hotel.paquete')->middleware('auth');
Route::get('/package/details/categoryHotel/edit/{idCategoriaHotel}', [CategoriashotelesController::class, 'edit'])->name('editar.categoria.hotel.paquete')->middleware('auth');
Route::put('/package/details/categoryHotel/edit/{idCategoriaHotel}', [CategoriashotelesController::class, 'update'])->name('update.categoria.hotel.paquete')->middleware('auth');
Route::delete('/package/details/categoryHotel/delete/{idCategoriaHotel}', [CategoriashotelesController::class, 'destroy'])->name('eliminar.categoria.hotel.paquete')->middleware('auth');

//Personal Paquete
Route::get('/package/details/personal/{idpaquete}', [PaquetesTipospersonalesController::class, 'index'])->name('index.nuevo.tipopersonal.paquete')->middleware('auth');
Route::post('/package/details/personal/save', [PaquetesTipospersonalesController::class, 'store'])->name('guardar.tipopersonal.paquete')->middleware('auth');
Route::get('/package/details/personal/edit/{idPaqueteTipoPersonal}', [PaquetesTipospersonalesController::class, 'edit'])->name('editar.tipopersonal.paquete')->middleware('auth');
Route::put('/package/details/personal/edit/{idPaqueteTipoPersonal}', [PaquetesTipospersonalesController::class, 'update'])->name('update.tipopersonal.paquete')->middleware('auth');
Route::delete('/package/details/personal/delete/{idPaqueteTipoPersonal}', [PaquetesTipospersonalesController::class, 'destroy'])->name('eliminar.tipopersonal.paquete')->middleware('auth');

//Tipo Transporte Paquete
Route::get('/package/details/transport/{idpaquete}', [PaquetesTipotransportesController::class, 'index'])->name('index.nuevo.tipo.transporte.paquete')->middleware('auth');
Route::post('/package/details/transport/save', [PaquetesTipotransportesController::class, 'store'])->name('guardar.tipo.transporte.paquete')->middleware('auth');
Route::get('/package/details/transport/edit/{idPaqueteTipoTransporte}', [PaquetesTipotransportesController::class, 'edit'])->name('editar.tipo.transporte.paquete')->middleware('auth');
Route::put('/package/details/trasnport/edit/{idPaqueteTipoTransporte}', [PaquetesTipotransportesController::class, 'update'])->name('update.tipo.transporte.paquete')->middleware('auth');
Route::delete('/package/details/trasnport/delete/{idPaqueteTipoTransporte}', [PaquetesTipotransportesController::class, 'destroy'])->name('eliminar.tipo.transporte.paquete')->middleware('auth');

//Alimentación en campo
Route::get('/package/details/alimentacion/{idpaquete}', [PaquetesTipoalimentacionesController::class, 'index'])->name('index.nuevo.alimentacion.campo.paquete')->middleware('auth');
Route::post('/package/details/alimentacion/save', [PaquetesTipoalimentacionesController::class, 'store'])->name('guardar.alimentacion.campo.paquete')->middleware('auth');
Route::get('/package/details/alimentacion/edit/{idPaqueteTipoAlimentacion}', [PaquetesTipoalimentacionesController::class, 'edit'])->name('editar.alimentacion.campo.paquete')->middleware('auth');
Route::put('/package/details/alimentacion/edit/{idPaqueteTipoAlimentacion}', [PaquetesTipoalimentacionesController::class, 'update'])->name('update.alimentacion.campo.paquete')->middleware('auth');
Route::delete('/package/details/alimentacion/delete/{idPaqueteTipoAlimentacion}', [PaquetesTipoalimentacionesController::class, 'destroy'])->name('eliminar.alimentacion.campo.paquete')->middleware('auth');

//Equipos
Route::get('/package/details/equipo/{idpaquete}', [PaquetesEquiposController::class, 'index'])->name('index.nuevo.equipo.paquete')->middleware('auth');
Route::post('/package/details/equipo/save', [PaquetesEquiposController::class, 'store'])->name('guardar.equipo.paquete')->middleware('auth');
Route::get('/package/details/equipo/edit/{idPaqueteEquipo}', [PaquetesEquiposController::class, 'edit'])->name('editar.equipo.paquete')->middleware('auth');
Route::put('/package/details/equipo/edit/{idPaqueteEquipo}', [PaquetesEquiposController::class, 'update'])->name('update.equipo.paquete')->middleware('auth');
Route::delete('/package/details/equipo/delete/{idPaqueteEquipo}', [PaquetesEquiposController::class, 'destroy'])->name('eliminar.equipo.paquete')->middleware('auth');

//Acemilas
Route::get('/package/details/acemilas/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'index'])->name('index.nuevo.tipo.acemila.paquete')->middleware('auth');
Route::post('/package/details/acemilas/save', [PaquetesAcemilasController::class, 'store'])->name('guardar.acemila.paquete')->middleware('auth');
Route::get('/package/details/acemilas/edit/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'edit'])->name('editar.acemila.paquete')->middleware('auth');
Route::put('/package/details/acemilas/edit/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'update'])->name('update.acemila.paquete')->middleware('auth');
Route::delete('/package/details/acemilas/delete/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'destroy'])->name('eliminar.acemila.paquete')->middleware('auth');

//Almuerzo
Route::get('/package/details/almuerzo/{idpaqueteAlmuerzo}', [PaquetesTipoalmuerzosController::class, 'index'])->name('index.nuevo.tipo.almuerzo.paquete')->middleware('auth');
Route::post('/package/details/almuerzo/save', [PaquetesTipoalmuerzosController::class, 'store'])->name('guardar.almuerzo.paquete')->middleware('auth');
Route::get('/package/details/almuerzo/edit/{idpaqueteAlmuerzo}', [PaquetesTipoalmuerzosController::class, 'edit'])->name('editar.almuerzo.paquete')->middleware('auth');
Route::put('/package/details/almuerzo/edit/{idpaqueteAlmuerzo}', [PaquetesTipoalmuerzosController::class, 'update'])->name('update.almuerzo.paquete')->middleware('auth');
Route::delete('/package/details/almuerzo/delete/{idpaqueteAlmuerzo}', [PaquetesTipoalmuerzosController::class, 'destroy'])->name('eliminar.almuerzo.paquete')->middleware('auth');
/****************************** */



/** PARA TRANSPORTES  ************************/

/*************************************** */



/*** PARA LAS RESERVAS */
//Clientes
Route::get('/reserved/clients/', [ClientesController::class, 'index'])->name('index.nuevos.clientes')->middleware('auth');

//Nuevas Reservas
Route::get('/reserved', [ReservasController::class, 'index'])->name('reservas.formulario.nivel.admin')->middleware('auth');
Route::post('/reserved/save', [ReservasController::class, 'store'])->name('guardar.reservas')->middleware('auth');
Route::post('/reserved/save/client', [ReservasController::class, 'storeNewClient'])->name('guardar.reservas.nuevos.clientes')->middleware('auth');
Route::get('/reserved/search/clients', [ReservasController::class, 'buscar'])->name('buscar.clientes.reserva')->middleware('auth');
//-POST
Route::get('/pendiente', [ReservasController::class, 'pendientes'])->name('reservas.pendientes')->middleware('auth');

//Reservas Pendientes

//Pagos
Route::get('/pagos', [ReservasController::class, 'pagos'])->name('pagos.reserva')->middleware('auth');

//Salud
Route::get('/reserva/salud', [ReservasController::class, 'salud'])->name('salud.cliente.reserva')->middleware('auth');
//Ficha - Salud
Route::get('/reser', [ReservasController::class, 'reser'])->name('pruebita')->middleware('auth');

//Postergación de los viajes
Route::get('/postergacion/reserva', [ReservasController::class, 'postergacion'])->name('postergacion.cliente.reserva')->middleware('auth');

//Atención de Solcitudes
Route::get('/postergacion/reserva/soli', [ReservasController::class, 'solicitud'])->name('atención.cliente.solicitud')->middleware('auth');
Route::get('/postergacion/reserva/atencion', [ReservasController::class, 'atencionSolicitud'])->name('atención.cliente.solicitud.revisar')->middleware('auth');

/************************************************* */






/**** PARA LOS VIAJES **********************/
Route::get('/viaje/{slug}/programacion', [ViajesPaquetesController::class, 'index'])->name('index.viajes.admin')->middleware('auth');
Route::post('/viaje/save', [ViajesPaquetesController::class, 'store'])->name('index.viajes.admin.store')->middleware('auth');
Route::get('/viaje/detalles/{id}', [ReservasController::class, 'asignarDetallesViaje'])->name('index.viajes.admin.asignar.detalles')->middleware('auth');
Route::get('/viaje/control/inicio', [ReservasController::class, 'viajeControl'])->name('index.viajes.control.admin')->middleware('auth');
Route::get('/viaje/control/inicio/detalles', [ReservasController::class, 'viajeControlDetalles'])->name('index.viajes.control.detalles.admin')->middleware('auth');

/** --- Viaje Automóviles */
Route::get('/viaje/detalles/asignacion/automoviles', [TrasladoViajesController::class, 'index'])->name('asignar.vehiculo.viaje')->middleware('auth');




/** Transporte */
Route::get('/transporte', [EmpresastransportesController::class, 'index'])->name('nuevos.transportes')->middleware('auth');
Route::get('/transporte/create', [EmpresastransportesController::class, 'create'])->name('nueva.empresa')->middleware('auth');
Route::post('/transporte/create/save', [EmpresastransportesController::class, 'store'])->name('guardar.empresa')->middleware('auth');

Route::get('/transporte/vehiculos/{slug}', [VehiculosController::class, 'index'])->name('nueva.vehiculo.empresa')->middleware('auth');
Route::get('/transporte/vehiculos/create/{idempresa?}', [VehiculosController::class, 'create'])->name('nueva.vehiculo.empresa.formulario')->middleware('auth');
Route::post('/transporte/vehiculos/create/save/{id}', [VehiculosController::class, 'store'])->name('guardar.vehiculo.empresa')->middleware('auth');

Route::get('/transporte/vehiculos/conductor/{idvehiculo}', [ChoferesController::class, 'index'])->name('nuevos.choferes.vehiculo')->middleware('auth');
Route::post('/transporte/vehiculos/conductor/save/{idvehiculo}', [ChoferesController::class, 'store'])->name('guardar.choferes.vehiculo')->middleware('auth');

/** Conductores */
Route::get('/conductores', [ChoferesController::class, 'index2'])->name('nuevos.choferes.vehiculo.admin')->middleware('auth');
Route::post('/transporte/vehiculos/conductor/save', [ChoferesController::class, 'store'])->name('guardar.choferes')->middleware('auth');

/** Guias */
Route::get('/guias', [GuiasController::class, 'index'])->name('nuevos.guias')->middleware('auth');
Route::post('/guias/save', [GuiasController::class, 'store'])->name('guardar.guias')->middleware('auth');

/** Cocineros */
Route::get('/cocineros', [CocinerosController::class, 'index'])->name('nuevos.cocineros')->middleware('auth');
Route::post('/cocineros/save', [CocinerosController::class, 'store'])->name('guardar.cocineros')->middleware('auth');

/** Arrieros */
Route::get('/arrieros', [ArrierosController::class, 'index'])->name('nuevos.arrieros')->middleware('auth');
Route::post('/arrieros/save', [ArrierosController::class, 'store'])->name('guardar.arrieros')->middleware('auth');

/** Asociaciones */
Route::get('/asociaciones', [AsociacionesController::class, 'index'])->name('nuevas.asociaciones')->middleware('auth');
Route::post('/asociaciones/save', [AsociacionesController::class, 'store'])->name('guardar.asociaciones')->middleware('auth');

/********************************************/







/***********  PARA LOS DOCUMENTOS Y LOS EQUIPOS */
Route::get('/comprobante', [ReservasController::class, 'indexComprobante'])->name('index.comprobante')->middleware('auth');
Route::get('/comprobante/nuevo', [ReservasController::class, 'nuevoComprobante'])->name('index.comprobante.crear')->middleware('auth');
Route::get('/comprobante/editar', [ReservasController::class, 'editarComprobante'])->name('index.comprobante.editar')->middleware('auth');

//Route::


/***  PROVEEDORES */
Route::get('/proveedores', [ReservasController::class, 'indexProveedores'])->name('index.proveedor')->middleware('auth');
Route::get('/proveedores/nuevo', [ReservasController::class, 'nuevoProveedor'])->name('index.proveedor.crear')->middleware('auth');
Route::get('/proveedores/editar', [ReservasController::class, 'editarProveedor'])->name('index.proveedor.editar')->middleware('auth');
Route::get('/proveedores/cuenta/nuevo', [ReservasController::class, 'cuentaProveedor'])->name('index.proveedor.cuenta.nuevo')->middleware('auth');


/******* BANCOS ********************/
Route::get('/bancos', [ReservasController::class, 'indexBancos'])->name('index.bancos')->middleware('auth');
Route::get('/bancos/crear', [ReservasController::class, 'crearBancos'])->name('index.bancos.crear')->middleware('auth');
Route::get('/bancos/editar', [ReservasController::class, 'editarBancos'])->name('index.bancos.editar')->middleware('auth');


/**  TIPOS DE COMPROBANTES */
Route::get('/tipoComprobantes', [ReservasController::class, 'indexTipoComprobantes'])->name('index.tipoComprobantes')->middleware('auth');
Route::get('/tipoComprobantes/nuevo', [ReservasController::class, 'editarTipoComprobantes'])->name('index.tipoComprobantes.nuevo')->middleware('auth');
Route::get('/tipoComprobantes/editar', [ReservasController::class, 'editarTipoComprobantes2'])->name('index.tipoComprobantes.editar')->middleware('auth');


/***  PEDIDOS A PROVEEDORES */
Route::get('/pedidosProveedores', [ReservasController::class, 'indexPedidosProveedores'])->name('index.tipoPedidosProveedores')->middleware('auth');