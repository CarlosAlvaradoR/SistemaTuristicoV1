<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTuristicos;
use App\Models\Fotogalerias;
use App\Models\FotoPaquetes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaquetesTuristicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paquetes=(DB::select('SELECT * FROM paquetes_turisticos p'));
        
        return view('paqueteturistico', compact('paquetes'));
    }

    public function detallepaquetes($idpaquete){ //Lo que se encuentra en los tabs al darle click a un paquete
        $galeriaFotos=(DB::select('SELECT fg.descripcionfoto, fg.imagen, f.idfotogaleria, idpaqueteturistico FROM foto_paquetes f
        INNER JOIN fotogalerias fg on f.idfoto_paquete=fg.idfotogaleria WHERE idpaqueteturistico='.$idpaquete.''));
        
        $mapaReferencias=(DB::select('SELECT  m.idmapareferencial,nombreruta, descripcionruta  FROM mapasreferenciales m
        INNER JOIN mapas_paquetes ma on m.idmapareferencial=ma.idmapareferencial
        INNER JOIN paquetes_turisticos p on p.idpaqueteturistico=ma.idpaqueteturistico
        WHERE p.idpaqueteturistico = '.$idpaquete.''));
        
        $nombrePaquetes =(DB::select('SELECT nombre FROM paquetes_turisticos p WHERE idpaqueteturistico= '.$idpaquete.' LIMIT 1'));
        //return $galeriaFotos;
        //$idpaquetes=[$idpaquete];
        $idpaquetes=DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1');
        //dd($galeriaFotos);
        //dd($nombrePaquetes);
        //return ($nombrePaquetes);
        //return ('SELECT fg.descripcionfoto, fg.imagen, f.idfotogaleria, idpaqueteturistico FROM foto_paquetes f
        //INNER JOIN fotogalerias fg on f.idfoto_paquete=fg.idfotogaleria WHERE idpaqueteturistico='.$idpaquete.'');
        //return $galeriaFotos;
        $itinerarios=DB::select('SELECT a.idactividaditinerario, a.nombreactividad, i.descripcion FROM actividadesitinerarios a
        INNER JOIN itinerarios_paquetes i on a.idactividaditinerario = i.idactividaditinerario WHERE idpaqueteturistico = '.$idpaquete.'');
        
        $servicios=DB::select('SELECT idpagoservicio, descripcion, monto, idpaqueteturistico FROM pagosservicios p WHERE idpaqueteturistico = '.$idpaquete.'');
        
        $categoriasHoteles=DB::select('SELECT idcategoriahotel, descripcion, idpaqueteturistico FROM categoriashoteles WHERE idpaqueteturistico= '.$idpaquete.' ');
        
        $tiposPersonales = DB::select('SELECT p.id, p.cantidad, p.idpaqueteturistico,t.idtipopersonal, t.nombreTipo  FROM paquetes_tipospersonales p
        INNER JOIN tipospersonales t on t.idtipopersonal=p.idtipopersonal WHERE p.idpaqueteturistico = '.$idpaquete.'');
        
        $transportesPaquetes = DB::select('SELECT pt.idpaquete_tipotransporte, pt.descripcion, pt.cantidad, pt.idpaqueteturistico, t.idtipotrasnporte, t.nombretipo FROM paquetes_tipotransportes pt
        INNER JOIN tipotransportes t on t.idtipotrasnporte = pt.idtipotrasnporte
        WHERE idpaqueteturistico = '.$idpaquete.'');
        $alimentacionCampos=DB::select('SELECT p.idpaquete_tipoalimentacion, p.descripcion, p.idtipoalimentacion, t.nombretipo
        FROM paquetes_tipoalimentaciones p
        INNER JOIN tipoalimentaciones t on p.idtipoalimentacion=t.idtipoalimentacion
        WHERE idpaqueteturistico = '.$idpaquete.' ORDER BY p.idpaquete_tipoalimentacion');

        $equipos=DB::select('SELECT p.idpaquete_equipo, p.cantidad, p.observacion, p.idequipo, e.nombre FROM paquetes_equipos p
        INNER JOIN equipos e on e.idequipo=p.idequipo WHERE p.idpaqueteturistico = '.$idpaquete.'');
        
        $acemilas = DB::select('SELECT t.nombre, p.idpaquete_acemila, p.cantidad, p.idtipoacemila, p.idpaqueteturistico FROM tiposacemilas t
        INNER JOIN paquetes_acemilas p on t.idtipoacemila=p.idtipoacemila WHERE p.idpaqueteturistico = '.$idpaquete.'');

        $almuerzos=DB::select('SELECT p.idpaquete_tipoalmuerzo, p.observacion, p.idtipoalmuerzo, p.idpaqueteturistico, t.nombre FROM paquetes_tipoalmuerzos p
        INNER JOIN tiposalmuerzos t on p.idtipoalmuerzo=t.idtipoalmuerzo WHERE p.idpaqueteturistico = '.$idpaquete.'');

        $atractivosVisitaPaquete=DB::select('SELECT l.nombre, a.descripcion, p.idpaquete_visitaatractivos FROM lugares l
        INNER JOIN atractivosturisticos a on l.idlugar=a.idlugar
        INNER JOIN paquetes_visitaatractivos p on p.idatractivoturistico=a.idatractivoturistico
        WHERE p.idpaqueteturistico = '.$idpaquete.'');

        return view('detallespaquete', compact('galeriaFotos','mapaReferencias','nombrePaquetes','idpaquetes', 'itinerarios', 'servicios', 'categoriasHoteles',
            'tiposPersonales','transportesPaquetes', 'alimentacionCampos', 'equipos', 'acemilas', 'almuerzos', 'atractivosVisitaPaquete'));
    }



    public function mostrarDestinos(){
        return view('vistalanding/destinoslanding');
    }

    public function create()
    {
        //
        
    }

    
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',  'imagen_principal' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

         $paquetesTuristicos = $request->all();
         
         if($imagen_principal = $request->file('imagen_principal')) {
             $rutaGuardarImg = 'imagen/';
             $imagenPaquete = date('YmdHis'). "." . $imagen_principal->getClientOriginalExtension();
             $imagen_principal->move($rutaGuardarImg, $imagenPaquete);
             $paquetesTuristicos['imagen_principal'] = "$imagenPaquete";             
         }
         
         PaquetesTuristicos::create($paquetesTuristicos);
         return redirect()->route('paquetes.formulario.nuevo')->with("succes","Agregado con éxito");
        //return "Insertado";
    }

    
    public function show(PaquetesTuristicos $paquetesTuristicos)
    {
        //
        
    }
    public function edit(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

   
    
    public function update(Request $request, PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

   
    public function destroy(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    public function formularionuevospaquetes(){
        $tipos=DB::select('SELECT idtipopaquete, nombretipo FROM tipopaquetes');
        return view('formulariopaquetesnuevos',compact('tipos'));
    }//

    public function formularioNuevoMapa($idpaquete){
        //return $idPaquete;
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1'));
        
        return view('paquetes/mapapaquetes/formularionuevomapa',compact('idpaquetes'));
    }


    public function mostrarDetallePaquete(){
        return view('vistalanding/destinodetails');
    }




    //PARA LOS LUGARES A VISITAR EN UN PAQUETE TURISTICO
    public function indexformulariolugaresvisitar(){

        
    }




    
}
