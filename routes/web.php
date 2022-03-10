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

Route::get('/', function () {
    return view('iniciodashboard');
});



//**************************************************************** */
//RUTAS PARA EL LANDING
Route::get('/', [UsuariosController::class, 'mostrarinicio'])->name('inicio.landing');//Inicio
Route::get('/about', [UsuariosController::class, 'mostrarabout'])->name('about.landing');//Inicio 
Route::get('/destination', [UsuariosController::class, 'mostrarDestinos'])->name('destination.landing');//Mostrar Destinos
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





/** PARA LOS PQUETES */
Route::get('/packages', [PaquetesTuristicosController::class, 'index'])->name('paquetes.activos.galeria');
Route::get('/packagescreate', [UsuariosController::class, 'formularionuevospaquetes'])->name('paquetes.formulario.nuevo');
Route::post('/pakcagestore', [PaquetesTuristicosController::class, 'store'])->name('paquetes.turisticos.creacion');//CREAR Guardar NUEVOS PAQUETES
Route::get('/packages/details/{idpaqueteturistico}', [PaquetesTuristicosController::class, 'detallepaquetes'])->name('paquetes.detalles');//MUESTRA LOS paquetes en el bucle
Route::get('/packages/details/newMap/{id}', [PaquetesTuristicosController::class, 'formularioNuevoMapa'])->name('paquetes.detalles.nuevo.paquetes');//MUESTRA LOS paquetes en el bucle
Route::post('/packages/details/newMap/save', [MapasreferencialesController::class, 'store'])->name('paquetes.detalles.guardar.mapas');//Para agregar rutas a los paquetes
Route::get('/packages/details/newMap/edit/{id}', [MapasreferencialesController::class, 'edit'])->name('paquetes.detalles.editar.mapas');//Para agregar rutas a los paquetes
Route::get('/mostrarData', [PaquetesTuristicosController::class, 'index'])->name('paquetes.index');


//FotoGalerías
Route::get('/packagecontrollers', [FotogaleriasController::class, 'index'])->name('foto.galerias');//CREAR Guardar NUEVOS PAQUETES
//Mapas
Route::get('/newMap', [PaquetesTuristicosController::class, 'formularioNuevoMapa'])->name('formulario.nuevo.mapa.paquete');//CREAR Guardar NUEVOS PAQUETES

/****************************** */










/*** PARA LAS RESERVAS */
Route::get('/reserved', [UsuariosController::class, 'mostrarFormularioReservaNivelAdmin'])->name('reservas.formulario.nivel.admin');





Route::get('/muestrausers', function () {
    //$datos= Tipo_usuarios::all();
    $datos=DB::select('SELECT * FROM personas p
    INNER JOIN usuarios u on p.idpersona=u.idpersona');
    return $datos;
});


