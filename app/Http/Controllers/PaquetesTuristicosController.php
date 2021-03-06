<?php

namespace App\Http\Controllers;

use App\Models\PaquetesTuristicos;
use App\Models\Fotogalerias;
use App\Models\FotoPaquetes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str; //SLUG

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


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
        
        return view('paquetes/index/index', compact('paquetes'));
    }

    public function detallepaquetes($idpaquete){ //Lo que se encuentra en los tabs al darle click a un paquete
        $galeriaFotos=(DB::select('SELECT fg.descripcionfoto, fg.imagen, f.idfotogaleria, idpaqueteturistico FROM foto_paquetes f
        INNER JOIN fotogalerias fg on f.idfoto_paquete=fg.idfotogaleria WHERE idpaqueteturistico='.$idpaquete.''));
        
        $mapaReferencias=(DB::select('SELECT  m.idmapareferencial,ma.imagen_ruta,nombreruta, descripcionruta  FROM mapasreferenciales m
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

        return view('paquetes/index/detalle', compact('galeriaFotos','mapaReferencias','nombrePaquetes','idpaquetes', 'itinerarios', 'servicios', 'categoriasHoteles',
            'tiposPersonales','transportesPaquetes', 'alimentacionCampos', 'equipos', 'acemilas', 'almuerzos', 'atractivosVisitaPaquete'));
    }



    

    public function create()
    {
        //
        $tipos=DB::select('SELECT idtipopaquete, nombretipo FROM tipopaquetes');
        return view('paquetes/index/nuevo',compact('tipos'));
    }

    
    public function store(Request $request)
    {
        //
        //$slug = Str::of('Laravel Framework')->slug('-');
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
         
         //$paquete=PaquetesTuristicos::create($paquetesTuristicos);
         $slug=Str::of($request->post('nombre'))->slug('-');
         $paquetes=PaquetesTuristicos::create([
            'nombre' => $request->post('nombre'),
            'precio' => $request->post('precio'),
            'estado' => $request->post('estado'),
            'imagen_principal' => $paquetesTuristicos['imagen_principal'],
            'slug' => $slug,
            'idtipopaquete' => $request->post('idtipopaquete')    
         ]);
         return redirect()->route('paquetes.formulario.nuevo')->with("succes","Agregado con ??xito");
        //return "Insertado";
    }

    
    public function show(PaquetesTuristicos $paquetesTuristicos)
    {
        //
        
    }
    public function edit($identificadorSlug)
    {
        //
        $identificador=DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos p WHERE slug= "'.$identificadorSlug.'" LIMIT 1');
        $id=$identificador[0]->idpaqueteturistico;

        $paqueteDetalles=DB::select('SELECT idpaqueteturistico, nombre, precio, estado, imagen_principal FROM paquetes_turisticos p WHERE idpaqueteturistico='.$id.'');
        $tipos=DB::select('SELECT idtipopaquete, nombretipo FROM tipopaquetes');
        return view('paquetes/index/editar', compact('paqueteDetalles', 'tipos'));
    }

   
    
    public function update(Request $request, $id)
    {
        //
        //return $request;
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'estado' => 'required',
            'idtipopaquete' => 'required|min:1'
        ]);
        //$tipoPaquete="";
        //$estado="";
        $prod = $request->all();
        
        $slug=Str::of($request->post('nombre'))->slug('-');
        $count=DB::select('SELECT COUNT(slug) as cantidad FROM paquetes_turisticos p WHERE slug="'.$slug.'" AND idpaqueteturistico <> '.$id.'');
        if ($count[0]->cantidad > 0) {
            $slug=$slug.'-1';
        }
        
        if($imagen = $request->file('imagen_principal')){
           //Storage::delete($image_path);
           $rutaGuardarImg = 'imagen/';
           $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
           $imagen->move($rutaGuardarImg, $imagenProducto);
           $prod['imagen_principal'] = "$imagenProducto";
           $paqueteUpdate=PaquetesTuristicos::where('idpaqueteturistico', $id)
                            ->update([
                                'nombre'=>$request->post('nombre'),
                                'precio' => $request->post('precio'),
                                'estado' => $request->post('estado'),
                                'imagen_principal'=>$prod['imagen_principal'],
                                'slug' => $slug,
                                'idtipopaquete' => $request->post('idtipopaquete')
           ]);
        }else{
            $paqueteUpdate=PaquetesTuristicos::where('idpaqueteturistico', $id)
            ->update([
                'nombre'=>$request->post('nombre'),
                'precio' => $request->post('precio'),
                'estado' => $request->post('estado'),
                'slug' => $slug,
                'idtipopaquete' => $request->post('idtipopaquete')
            ]);
        }
        
        return redirect()->route('paquetes.activos.galeria');
    }

   
    public function destroy(PaquetesTuristicos $paquetesTuristicos)
    {
        //
    }

    public function formularionuevospaquetes(){
        
    }//

    public function mostrarDestinos(){

        $paquetes = PaquetesTuristicos::paginate(4);
        //$paquetes=(DB::select('SELECT * FROM paquetes_turisticos p'));
        //return $paquetes;
        return view('vistalanding/destinoslanding', compact('paquetes'));
    }


    public function formularioNuevoMapa($idpaquete){
        //return $idPaquete;
        $idpaquetes=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos WHERE idpaqueteturistico='.$idpaquete.' LIMIT 1'));
        
        return view('paquetes/mapapaquetes/formularionuevomapa',compact('idpaquetes'));
    }


    public function mostrarDetallePaquete($identificadorSlug){
        
        $idPaquete=(DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos p WHERE slug = "'.$identificadorSlug.'" LIMIT 1'));
        
        $id=$idPaquete[0]->idpaqueteturistico;
        
        $paquetes=DB::select('SELECT nombre, imagen_principal FROM paquetes_turisticos p WHERE idpaqueteturistico = "'.$id.'" LIMIT 1');
        
        //SACANOS EL ID
        
        //PARA GALER??AS
        $cantidadGalerias=DB::select('SELECT COUNT(*) AS cantidad FROM foto_paquetes f WHERE idpaqueteturistico='.$id.'');
        //return ('SELECT COUNT(*) AS cantidad FROM foto_paquetes f WHERE idpaqueteturistico='.$id.'');
        $galeriaFotos=DB::select('SELECT fg.descripcionfoto, fg.imagen FROM foto_paquetes f
        INNER JOIN fotogalerias fg on fg.idfotogaleria=f.idfotogaleria
        WHERE idpaqueteturistico='.$id.'');

        $mapaReferencias=(DB::select('SELECT  m.idmapareferencial,ma.imagen_ruta,nombreruta, descripcionruta  FROM mapasreferenciales m
        INNER JOIN mapas_paquetes ma on m.idmapareferencial=ma.idmapareferencial
        INNER JOIN paquetes_turisticos p on p.idpaqueteturistico=ma.idpaqueteturistico
        WHERE p.idpaqueteturistico = '.$id.' LIMIT 1'));

        $lugasresVisita=DB::select('SELECT a.idatractivoturistico, a.descripcion FROM atractivosturisticos a
        INNER JOIN paquetes_visitaatractivos p on a.idatractivoturistico=p.idatractivoturistico
        WHERE idpaqueteturistico='.$id.'');

        $itinerarios=DB::select('SELECT itinerarios_paquetes, descripcion FROM itinerarios_paquetes i
        WHERE idpaqueteturistico='.$id.'');

        $alimentacionCampo=DB::select('SELECT descripcion FROM paquetes_tipoalimentaciones p
        WHERE idpaqueteturistico='.$id.'');

        $equipos=DB::select('SELECT p.idpaquete_equipo, p.cantidad, p.observacion, p.idequipo, e.nombre FROM paquetes_equipos p
        INNER JOIN equipos e on e.idequipo=p.idequipo WHERE p.idpaqueteturistico = '.$id.'');

        $acemilas = DB::select('SELECT t.nombre, p.idpaquete_acemila, p.cantidad, p.idtipoacemila, p.idpaqueteturistico FROM tiposacemilas t
        INNER JOIN paquetes_acemilas p on t.idtipoacemila=p.idtipoacemila WHERE p.idpaqueteturistico = '.$id.'');

        $categoriasHoteles=DB::select('SELECT idcategoriahotel, descripcion, idpaqueteturistico FROM categoriashoteles WHERE idpaqueteturistico= '.$id.' ');
    
        $almuerzos=DB::select('SELECT p.idpaquete_tipoalmuerzo, p.observacion, p.idtipoalmuerzo, p.idpaqueteturistico, t.nombre FROM paquetes_tipoalmuerzos p
        INNER JOIN tiposalmuerzos t on p.idtipoalmuerzo=t.idtipoalmuerzo WHERE p.idpaqueteturistico = '.$id.'');

        $transportesPaquetes = DB::select('SELECT pt.idpaquete_tipotransporte, pt.descripcion, pt.cantidad, pt.idpaqueteturistico, t.idtipotrasnporte, t.nombretipo FROM paquetes_tipotransportes pt
        INNER JOIN tipotransportes t on t.idtipotrasnporte = pt.idtipotrasnporte
        WHERE idpaqueteturistico = '.$id.'');
        return view('vistalanding/destinodetails', 
                    compact('paquetes','cantidadGalerias','galeriaFotos','mapaReferencias',
                    'lugasresVisita', 'itinerarios', 'alimentacionCampo', 'equipos', 
                    'acemilas', 'categoriasHoteles', 'almuerzos', 'transportesPaquetes'));
    }

    public function prueba($id, $slug){
        //echo "EL ID:".$id.'<br> EL SLUG:'.$slug;
        //return view('vistalanding/destinodetails');
    }


    public function reservarExterno(){
        return view('reservas/indexReservaCliente/reservar');
    }

    //PARA LOS LUGARES A VISITAR EN UN PAQUETE TURISTICO
    public function indexformulariolugaresvisitar(){

        
    }




    
}
