<?php

namespace App\Http\Controllers;

use App\Models\AlmuerzosCelebraciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlmuerzosCelebracionesController extends Controller
{
    
    public function index($id)
    {
        //

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $asociaciones=DB::select('SELECT id, nombre FROM asociaciones');

        $almuerzosAsociaciones=DB::select('SELECT ac.id, ac.descripcion, ac.cantidad, ac.monto, a.nombre FROM almuerzos_celebraciones ac
        INNER JOIN asociaciones a on a.id=ac.asociacion_id 
        WHERE ac.viaje_paquete_id = '.$id.'');
        $idViaje=$id;
        return view('viaje/index/asignarAlmuerzos', compact('idViaje', 'asociaciones', 'almuerzosAsociaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idViaje)
    {
        //
        $almuerzosCelebraciones = AlmuerzosCelebraciones::create([
            'descripcion'=> $request->post('descripcion_almuerzo'), 
            'cantidad' => $request->post('cantidad_almuerzos'), 
            'monto' => $request->post('monto_almuerzos'), 
            'viaje_paquete_id' => $idViaje, 
            'asociacion_id'=> $request->post('asociacion_pk')
        ]);
        return redirect()->route('asignar.almuerzos.viaje',[$idViaje])->with("succes","Agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlmuerzosCelebraciones  $almuerzosCelebraciones
     * @return \Illuminate\Http\Response
     */
    public function show(AlmuerzosCelebraciones $almuerzosCelebraciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlmuerzosCelebraciones  $almuerzosCelebraciones
     * @return \Illuminate\Http\Response
     */
    public function edit(AlmuerzosCelebraciones $almuerzosCelebraciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlmuerzosCelebraciones  $almuerzosCelebraciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlmuerzosCelebraciones $almuerzosCelebraciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlmuerzosCelebraciones  $almuerzosCelebraciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAlmuerzoCelebracion, $idViajePaquete)
    {
        //
        $eliminarTrasladoViajes=AlmuerzosCelebraciones::where('id',$idAlmuerzoCelebracion)
        ->delete();
        
        return redirect()->route('asignar.almuerzos.viaje',[$idViajePaquete])->with("succes","Agregado con éxito");
        
    }
}
