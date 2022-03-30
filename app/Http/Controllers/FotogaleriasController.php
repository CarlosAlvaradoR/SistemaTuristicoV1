<?php

namespace App\Http\Controllers;

use App\Models\Fotogalerias;
use App\Models\FotoPaquetes;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class FotogaleriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpaquete)
    {
        //
        $consulta=DB::select('SELECT fg.descripcionfoto, fg.imagen, f.idfotogaleria, idpaqueteturistico FROM foto_paquetes f
        INNER JOIN fotogalerias fg on f.idfoto_paquete=fg.idfotogaleria');

        $idpaquetes=DB::select('SELECT idpaqueteturistico FROM paquetes_turisticos p WHERE idpaqueteturistico = '.$idpaquete.' LIMIT 1');

        return view('paquetes/fotogalerias/formularionuevasfotosgaleria', compact('idpaquetes'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'descripcionfoto',  'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);
         $paquetesTuristicos = $request->all();
         
         if($imagen_principal = $request->file('imagen')) {
             $rutaGuardarImg = 'imagen/';
             $imagenPaquete = date('YmdHis'). "." . $imagen_principal->getClientOriginalExtension();
             $imagen_principal->move($rutaGuardarImg, $imagenPaquete);
             $paquetesTuristicos['imagen'] = "$imagenPaquete";             
         }
         
        
        Fotogalerias::create([
            'descripcionfoto'=>$request->post('descripcionfoto'),
            'imagen'=>$paquetesTuristicos['imagen']
        ]);

         //SEGUNDA INSERCION
        
        $idfotopaquete=(DB::select('SELECT idfotogaleria FROM fotogalerias f ORDER BY idfotogaleria DESC LIMIT 1'));
        $fotoPaquetes=new FotoPaquetes();
        $fotoPaquetes->idfotogaleria=($idfotopaquete[0]->idfotogaleria); //Ultimo id
        $fotoPaquetes->idpaqueteturistico=$request->post('idpaqueteturistico');
        $fotoPaquetes->save();
        
        return redirect()->route('foto.nuevas.galerias',[$request->post('idpaqueteturistico')])->with("succes","Agregado con éxito");
    }

    
    public function show(Fotogalerias $fotogalerias)
    {
        //
    }

    
    public function edit($id)
    {
        $datos = DB::select('SELECT f.idfotogaleria, f.descripcionfoto, f.imagen FROM fotogalerias f WHERE f.idfotogaleria='.$id.' LIMIT 1');
        return view('paquetes/fotogalerias/editarfotosgaleria', compact('datos'));
    }

    
    public function update(Request $request, $id)
    {
       
        $request->validate([
             'descripcionfoto' => 'required'
        ]);
         $prod = $request->all();
         //$rutaImagen = DB::select('SELECT imagen FROM fotogalerias f where f.idfotogaleria='.$id.'');
         //$image_path =   public_path('/imagen/' . $rutaImagen[0]->imagen);
         if($imagen = $request->file('imagen')){
            //Storage::delete($image_path);
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['imagen'] = "$imagenProducto";
            Fotogalerias::where('idfotogaleria',$id)
            ->update(['descripcionfoto'=>$request->post('descripcionfoto'),'imagen'=>$prod['imagen']
            ]);
         }else{
            Fotogalerias::where('idfotogaleria',$id)
                ->update(['descripcionfoto'=>$request->post('descripcionfoto')
                ]);
         }
         
         $idpaquete=DB::select('SELECT fp.idpaqueteturistico FROM fotogalerias f
         INNER JOIN foto_paquetes fp on f.idfotogaleria=fp.idfotogaleria WHERE fp.idfotogaleria='.$id.' LIMIT 1');

         return redirect()->route("paquetes.detalles",[$idpaquete[0]->idpaqueteturistico]);
    }

    
    public function destroy($idFotoGaleria)
    {
        $idPaquete=DB::select('SELECT i.idpaqueteturistico FROM pagosservicios i WHERE i.idpagoservicio = '.$idPagoServicio.' LIMIT 1');
        
        Pagosservicios::where('idpagoservicio',$idPagoServicio)
        ->delete();

        return redirect()->route("paquetes.detalles",[$idPaquete[0]->idpaqueteturistico]);
    }
}
