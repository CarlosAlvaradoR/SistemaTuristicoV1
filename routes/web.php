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

/*
Route::get('/', function () {
    return view('iniciodashboard');
});

*/

//**************************************************************** */
//RUTAS PARA EL LANDING
Route::get('/', [UsuariosController::class, 'mostrarinicio'])->name('inicio.landing');//Inicio
Route::get('/about', [UsuariosController::class, 'mostrarabout'])->name('about.landing');//Inicio 
Route::get('/destination', [PaquetesTuristicosController::class, 'mostrarDestinos'])->name('destination.landing');//Mostrar Destinos
Route::get('/detailsdestinations', [PaquetesTuristicosController::class, 'mostrarDetallePaquete'])->name('destination.landing.details');//Mostrar Detalles Destino Seleccionado
Route::get('/contact', [UsuariosController::class, 'mostrarContacto'])->name('contact.landing');//Mostrar Contacto
Route::get('/account', [UsuariosController::class, 'mostrarFormularioLogin'])->name('account.landing');//Mostrar Formulario de Inicio de Sesion
//Route::get('/account', [UsuariosController::class, 'mostrarContacto'])->name('contact.landing');//Mostrar Formulario de nuevos Usuarios
//**************************************************************** */






// RUTAS PARA EL DASHBOARD

/** PARA EL INICIO */
Route::get('/homedash', [UsuariosController::class, 'homedash'])->name('home.dashboard');




/** PARA EL NUEVOS USUARIOS */
Route::get('/newuser', [UsuariosController::class, 'mostrarFormularioRegistro'])->name('usuarios.nuevos');
Route::post('/newuser/create', [PersonasController::class, 'store'])->name('usuarios.create');

/** PARA LOS PERMISOS DE LOS USUARIOS */
Route::get('/users', [UsuariosController::class, 'mostrarUsuariosPermisos'])->name('usuarios.permisos');

/** ORGANIZACIONES - ACÉMILAS - GUÍA */
Route::get('/organitations', [UsuariosController::class, 'mostrarTabsOrgaAceEquipo'])->name('organizaciones.acemilas.equipos');





/** PARA LOS PAQUETES */
Route::get('/package', [PaquetesTuristicosController::class, 'index'])->name('paquetes.activos.galeria');
Route::get('/package/create', [PaquetesTuristicosController::class, 'formularionuevospaquetes'])->name('paquetes.formulario.nuevo');
Route::post('/pakcagestore', [PaquetesTuristicosController::class, 'store'])->name('paquetes.turisticos.creacion');//CREAR Guardar NUEVOS PAQUETES
Route::get('/packages/details/{idpaqueteturistico}', [PaquetesTuristicosController::class, 'detallepaquetes'])->name('paquetes.detalles');//MUESTRA LOS paquetes en el bucle

//Mapas
Route::get('/packages/details/newMap/{id}', [PaquetesTuristicosController::class, 'formularioNuevoMapa'])->name('paquetes.detalles.nuevo.paquetes');//MUESTRA LOS paquetes en el bucle
Route::post('/packages/details/newMap/save', [MapasreferencialesController::class, 'store'])->name('paquetes.detalles.guardar.mapas');//Para agregar rutas a los paquetes
Route::get('/packages/details/newMap/edit/{id}', [MapasreferencialesController::class, 'edit'])->name('paquetes.detalles.editar.mapas');//Para agregar rutas a los paquetes
Route::put('/packages/details/newMap/update/{id}', [MapasreferencialesController::class, 'update'])->name('paquetes.detalles.actualizar.mapas');//Para agregar rutas a los paquetes
Route::get('/mostrarData', [PaquetesTuristicosController::class, 'index'])->name('paquetes.index');


//FotoGalerías
Route::get('/package/details/create/gallery/{idpaquete}', [FotogaleriasController::class, 'index'])->name('foto.nuevas.galerias');//CREAR Guardar NUEVOS PAQUETES
Route::post('/package/details/create/gallery/create', [FotogaleriasController::class, 'store'])->name('paquetes.turisticos.creacion.galeria');//CREAR Guardar NUEVOS PAQUETES
Route::get('/package/details/edit/{id}', [FotogaleriasController::class, 'edit'])->name('paquetes.turisticos.edicion.galeria');//CREAR Guardar NUEVOS PAQUETES
Route::put('/package/details/edit/update/{id}', [FotogaleriasController::class, 'update'])->name('paquetes.turisticos.actualizar.galeria');//Para agregar rutas a los paquetes
//Mapas
Route::get('/newMap', [PaquetesTuristicosController::class, 'formularioNuevoMapa'])->name('formulario.nuevo.mapa.paquete');//CREAR Guardar NUEVOS PAQUETES

//Tipos
Route::get('/types', [TipopaquetesController::class, 'index'])->name('index.tipo.paquete');//Nuevos tipos de paquetes
Route::get('/types/new', [TipopaquetesController::class, 'formularioNuevosTipos'])->name('formulario.nuevo.tipo.paquete');//Nuevos tipos de paquetes
Route::post('/types/save', [TipopaquetesController::class, 'store'])->name('formulario.guardar.tipo.paquete');//Nuevos tipos de paquetes
Route::get('/types/edit/{idpaquete}', [TipopaquetesController::class, 'edit'])->name('formulario.editar.tipo.paquete');//Nuevos tipos de paquetes
Route::put('/types/edit/save/{idpaquete}', [TipopaquetesController::class, 'update'])->name('formulario.editar.guardar.tipo.paquete');//Nuevos tipos de paquetes
Route::get('/types/delete/{idpaquete}', [TipopaquetesController::class, 'destroy'])->name('formulario.eliminar.tipo.paquete');//Nuevos tipos de paquetes

//Lugares a visitar
Route::get('/places/{idpaquete}', [PaquetesTuristicosController::class, 'indexformulariolugaresvisitar'])->name('index.formulario.nuevo.atractivo');//Nuevos tipos de paquetes

//Itinerario
Route::get('/package/itinerary/{idpaquete}', [ActividadesitinerariosController::class, 'index'])->name('index.formulario.nuevo.itinerario');//Nuevos tipos de paquetes
Route::post('/package/itinerary/save', [ActividadesitinerariosController::class, 'store'])->name('guardar.itinerario.paquete');
Route::get('/package/itinerary/edit/{idactividad}', [ActividadesitinerariosController::class, 'edit'])->name('editar.itinerario.paquete');
Route::put('/package/itinerary/edit/{idactividad}', [ActividadesitinerariosController::class, 'update'])->name('update.itinerario.paquete');//Nuevos tipos de paquetes
Route::delete('/package/itinerary/delete/{idactividad}', [ActividadesitinerariosController::class, 'destroy'])->name('eliminar.itinerario.paquete');

//Servicios
Route::get('/package/details/services/{idpaquete}', [PagosserviciosController::class, 'index'])->name('index.formulario.nuevo.servicio');//Nuevos tipos de paquetes
Route::post('/package/details/save', [PagosserviciosController::class, 'store'])->name('guardar.servicio.paquete');
Route::get('/package/details/services/edit/{idactividad}', [PagosserviciosController::class, 'edit'])->name('editar.servicio.paquete');
Route::put('/package/details/services/edit/{idactividad}', [PagosserviciosController::class, 'update'])->name('update.servicio.paquete');
Route::delete('/package/details/services/delete/{idactividad}', [PagosserviciosController::class, 'destroy'])->name('eliminar.servicio.paquete');

//Categoría Hoteles
Route::get('/package/details/categoryHotel/{idpaquete}', [CategoriashotelesController::class, 'index'])->name('index.formulario.nueva.categoria.hotel.paquete');
Route::post('/package/details/categoryHotel/save', [CategoriashotelesController::class, 'store'])->name('guardar.categoria.hotel.paquete');
Route::get('/package/details/categoryHotel/edit/{idCategoriaHotel}', [CategoriashotelesController::class, 'edit'])->name('editar.categoria.hotel.paquete');

//Personal Paquete
Route::get('/package/details/personal/{idpaquete}', [PaquetesTipospersonalesController::class, 'index'])->name('index.nuevo.tipopersonal.paquete');
Route::post('/package/details/personal/save', [PaquetesTipospersonalesController::class, 'store'])->name('guardar.tipopersonal.paquete');

//Tipo Transporte Paquete
Route::get('/package/details/transport/{idpaquete}', [PaquetesTipotransportesController::class, 'index'])->name('index.nuevo.tipo.transporte.paquete');
Route::post('/package/details/transport/save', [PaquetesTipotransportesController::class, 'store'])->name('guardar.tipo.transporte.paquete');
Route::get('/package/details/transport/edit/{idPaqueteTipoTransporte}', [PaquetesTipotransportesController::class, 'edit'])->name('editar.tipo.transporte.paquete');
Route::put('/package/details/trasnport/edit/{idPaqueteTipoTransporte}', [PaquetesTipotransportesController::class, 'update'])->name('update.tipo.transporte.paquete');
Route::delete('/package/details/trasnport/delete/{idPaqueteTipoTransporte}', [PaquetesTipotransportesController::class, 'destroy'])->name('eliminar.tipo.transporte.paquete');

//Alimentación en campo
Route::get('/package/details/alimentacion/{idpaquete}', [PaquetesTipoalimentacionesController::class, 'index'])->name('index.nuevo.alimentacion.campo.paquete');
Route::post('/package/details/alimentacion/save', [PaquetesTipoalimentacionesController::class, 'store'])->name('guardar.alimentacion.campo.paquete');
Route::get('/package/details/alimentacion/edit/{idPaqueteTipoAlimentacion}', [PaquetesTipoalimentacionesController::class, 'edit'])->name('editar.alimentacion.campo.paquete');
Route::put('/package/details/alimentacion/edit/{idPaqueteTipoAlimentacion}', [PaquetesTipoalimentacionesController::class, 'update'])->name('update.alimentacion.campo.paquete');

//Equipos
Route::get('/package/details/equipo/{idpaquete}', [PaquetesEquiposController::class, 'index'])->name('index.nuevo.equipo.paquete');
Route::post('/package/details/equipo/save', [PaquetesEquiposController::class, 'store'])->name('guardar.equipo.paquete');
Route::get('/package/details/equipo/edit/{idPaqueteEquipo}', [PaquetesEquiposController::class, 'edit'])->name('editar.equipo.paquete');
Route::put('/package/details/equipo/edit/{idPaqueteEquipo}', [PaquetesEquiposController::class, 'update'])->name('update.equipo.paquete');
Route::delete('/package/details/equipo/delete/{idPaqueteEquipo}', [PaquetesEquiposController::class, 'destroy'])->name('eliminar.equipo.paquete');

//Acemilas
Route::get('/package/details/acemilas/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'index'])->name('index.nuevo.tipo.acemila.paquete');
Route::post('/package/details/acemilas/save', [PaquetesAcemilasController::class, 'store'])->name('guardar.acemila.paquete');
Route::get('/package/details/acemilas/edit/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'edit'])->name('editar.acemila.paquete');
Route::put('/package/details/acemilas/edit/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'update'])->name('update.acemila.paquete');
Route::delete('/package/details/acemilas/delete/{idPaqueteAcemila}', [PaquetesAcemilasController::class, 'destroy'])->name('eliminar.acemila.paquete');

//Almuerzo
Route::get('/package/details/almuerzo/{idpaquete}', [PaquetesTipoalmuerzosController::class, 'index'])->name('index.nuevo.tipo.almuerzo.paquete');
/****************************** */










/*** PARA LAS RESERVAS */
//Nuevas Reservas
Route::get('/reserved', [UsuariosController::class, 'mostrarFormularioReservaNivelAdmin'])->name('reservas.formulario.nivel.admin');

//Reservas Pendientes

/************************************************* */






