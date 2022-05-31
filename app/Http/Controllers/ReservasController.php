<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use App\Models\Personas;
use App\Models\Clientes;
use App\Models\Pagos;
use App\Models\Boletas;
use App\Models\ViajeParticipantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservasController extends Controller
{
    
    public function index(Request $request)
    {
        //
        $dni=$request->get('dni');
        
        if($dni==null){
            $dni='89';
        }
        $cliente=DB::select('SELECT  c.idcliente, p.dni, p.nombres, p.apellidos, if(p.genero=1,"MASCULINO","FEMENINO") as genero, p.direccion, n.nombre as nacionalidad  FROM personas p
        INNER JOIN clientes c on p.idpersona=c.idpersona
        INNER JOIN nacionalidades n on n.idnacionalidad=c.idnacionalidad
        WHERE p.dni = '.$dni.' LIMIT 1');
       // return $cliente;
       //return redirect()->route("reservas.formulario.nivel.admin",['chiclayo']);
       $paquetes=DB::select('SELECT idpaqueteturistico, nombre FROM paquetes_turisticos');
       
       $viajes=DB::select('SELECT id, descripcion, date_format(fecha, "%d-%m-%Y") as fecha, hora FROM viajes_paquetes');
        
       $nacionalidades=DB::select('SELECT idnacionalidad, nombre FROM nacionalidades');

       return view('reservas/index/nuevo', compact('cliente', 'paquetes','viajes','nacionalidades'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //return $request;
        
        $persona = Personas::create([
            'dni'=>$request->post('dni'), 
            'nombres'=>$request->post('nombres'), 
            'apellidos'=>$request->post('apellidos'), 
            'genero'=>$request->post('genero'), 
            'direccion'=>$request->post('direccion'), 
            'telefono'=>$request->post('telefono'), 
            'correo'=>$request->post('correo')
        ]);

        $idpersona=(DB::select('SELECT idpersona as idpersona FROM personas ORDER BY idpersona desc limit 1'));
        $cliente = Clientes::create([
            'idnacionalidad' => $request->post('nacionalidad'), 
            'idpersona' => $idpersona[0]->idpersona
        ]);
        
        $idcliente=(DB::select('SELECT idcliente FROM clientes ORDER BY idcliente DESC LIMIT 1'));
        $reservas = Reservas::create([
            'fecha_reserva' => $request->post('fecha-reserva'), //date('d-m-Y)
            'observacion' => '', 
            'idcliente'=>$idcliente[0]->idcliente, 
            'tiporeserva_id'=> 2, 
            'estadoreserva_id'=> 1,  // ESTO LUEGO SE PUEDE VALIDAR º º   
            'idpaqueteturistico' => $request->post('paquete')
        ]);
        $idreserva=DB::select('SELECT idreserva FROM reservas ORDER BY idreserva DESC LIMIT 1');
        
        $boleta = Boletas::create([
            'numero' => '2627', 
            'observaciones' => null, 
            'monto' => $request->post('monto'), 
            'fecha_emision' => date('Y-m-d') 
        ]);
        $idboleta=DB::select('SELECT id FROM boletas ORDER BY id DESC LIMIT 1');
        $pagos = Pagos::create([
            'boleta_id' => $idboleta[0]->id, 
            'factura_id' => null, 
            'paypalpagos_id'=> null, 
            'idreserva' => $idreserva[0]->idreserva
        ]);

        if ($request->post('viaje')!="0") {
            $viajeParticipantes=ViajeParticipantes::create([
                'viaje_id'=> $request->post('viaje'), 
                'idreserva'=> $idreserva[0]->idreserva, 
                'estado_id'=> 1
            ]);
        }
        
        return redirect()->route('reservas.formulario.nivel.admin')->with("succes","Agregado con éxito");
    }


    public function storeNewClient(Request $request){
        return $request;
    }


    public function show(Reservas $reservas)
    {
        //
    }

    
    public function edit(Reservas $reservas)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservas $reservas)
    {
        //
    }

    public function pendientes(){
        return view('reservas/index/pendiente');
    }
    public function pagos(){
        return view('reservas/index/pago');
    }
    public function salud(){
        return view('reservas/salud/index');
    }
    public function postergacion(){
        return view('reservas/eventospostergacion/index');
    }
    public function solicitud(){
        return view('reservas/solicitud/atencion');
    }
    public function atencionSolicitud(){
        return view('reservas/solicitud/proceso');
    }
    public function asignarDetallesViaje($id){
        DB::statement("SET SQL_MODE=''");
        $datos=DB::select('SELECT * FROM V_Reservas WHERE viaje_id='.$id.'');
        
        $vehiculosProgramados=DB::select('SELECT et.nombre_empresa, v.placa,tv.monto, tv.id FROM empresastransportes et
        INNER JOIN vehiculos v on et.id=v.empresatransporte_id
        INNER JOIN traslado_viajes tv on tv.vehiculo_id=v.id
        INNER JOIN viajes_paquetes vp on vp.id=tv.viaje_paquete_id
        WHERE tv.viaje_paquete_id = '.$id.'');

        $idViaje=$id;
        return view('viaje/index/detalles', compact('datos','idViaje','vehiculosProgramados'));
    }
    public function viajeControl(){
        return view('viaje/componentes/index');
    }
    public function viajeControlDetalles(){
        return view('viaje/componentes/detalles');
    }
    public function reser(){
        
        $slug = Str::slug('Laravel 5 Framework de PHP', '-');
        return $slug;
    }
    public function buscar(Request $request){
        $dni=$request->post('dni');
        $cliente=DB::select('SELECT p.dni, p.nombres, p.apellidos FROM clientes c
        INNER JOIN personas p on p.idpersona=c.idpersona WHERE p.dni='.$dni.' LIMIT 1');
        
        return redirect()->route('reservas.formulario.nivel.admin');
    }

    public function indexComprobante(){
        return view('creacionDocumentos/comprobantes/index');
    }

    public function nuevoComprobante(){
        return view('creacionDocumentos/comprobantes/nuevo');
    }
    public function editarComprobante(){
        return view('creacionDocumentos/comprobantes/editar');
    }

    public function indexProveedores(){
        return view('creacionDocumentos/proveedores/index');
    }

    public function nuevoProveedor(){
        return view('creacionDocumentos/proveedores/nuevo');
    }

    public function editarProveedor(){
        return view('creacionDocumentos/proveedores/editar');
    }

    public function cuentaProveedor(){
        return view('creacionDocumentos/proveedores/cuenta');
    }


    /*****  BANCOS */
    public function indexBancos(){
        return view('creacionDocumentos/bancos/index');
    }

    public function crearBancos(){
        return view('creacionDocumentos/bancos/nuevo');
    }

    public function editarBancos(){
        return view('creacionDocumentos/bancos/editar');
    }

    /*** TIPOS DE COMPROBANTES */
    public function indexTipoComprobantes(){
        return view('creacionDocumentos/tipoComprobantes/index');
    }  

    public function editarTipoComprobantes(){
        return view('creacionDocumentos/tipoComprobantes/nuevo');
    } 

    public function editarTipoComprobantes2(){
        return view('creacionDocumentos/tipoComprobantes/editar');
    }
    
    /*** PEDIDOS A PROVEEDORES */ 
    public function indexPedidosProveedores(){
        return view('pedidosProveedores/index/index');
    }
}
