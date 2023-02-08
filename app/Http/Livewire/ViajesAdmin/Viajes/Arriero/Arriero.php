<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Arriero;

use App\Models\Personas;
use App\Models\Viajes\Arrieros;
use App\Models\Viajes\Asociaciones;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Arriero extends Component
{
    public $empresa;
    public $numero_placa, $descripcion, $empresa_transportes_id, $tipo_de_vehiculo, $idSeleccionado; //PARA GUARDAR VEHÍCULO
    public $numero_licencia, $tipo_de_licencia;
    public $idVehiculo;

    /** Para buscar Choferes */
    public $idArriero = 0;
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoArriero = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;


    public function render()
    {
        $asociaciones = Asociaciones::all(['id', 'nombre']);
        $arrieros = DB::table('personas as p')
            ->join('arrieros as a', 'a.persona_id', '=', 'p.id')
            ->join('asociaciones as aso', 'aso.id', '=', 'a.asociaciones_id')
            ->select(
                DB::raw('CONCAT(p.nombre, " ", p.apellidos) AS datos'),
                'p.dni',
                'aso.nombre', 
                'a.id as idArriero'
            )
            ->get();

        return view('livewire.viajes-admin.viajes.arriero.arriero', 
        compact('asociaciones', 'arrieros')
    );
    }

    public function buscarArriero()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        //$this->resetUI();
        $sql = "SELECT p.id, p.dni, concat(p.nombre,' ',p.apellidos) as datos, p.telefono, a.id as idArriero FROM personas p
        LEFT JOIN arrieros a on a.persona_id = p.id
        WHERE p.dni = '" . $this->dni . "' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->idPersona = $this->buscar[0]->id;
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->telefono_arriero = $this->buscar[0]->telefono;
            $this->encontradoComoPersona = true;

            //$this->encontrado = true;
            if ($this->buscar[0]->idArriero) {
                $this->idArriero = $this->buscar[0]->idArriero;
                $this->encontradoComoArriero = true;
                $this->emit('mensaje-info', 'La persona identificada con DNI: ' . $this->dni . ' ya se encuentra registrada como Chofer');
            }
            $this->reset(['dni']);
        } else {
            session()->flash('message-error', 'No se encontró informacion correspondiente al DNI: ' . $this->dni);
            $this->no_existe = true;
            $this->dni_persona = $this->dni;
            $this->resetValidation();
            $this->reset(['dni']);
        }
    }

    public function guardarPersonaArriero()
    { //Guarda la persona que ya existe y los atributos del Cliente
        $this->validate(
            [
                'asociacion' => 'required|min:1',
            ]
        );

        $arriero = Arrieros::create([
            'persona_id' => $this->idPersona, 
            'asociaciones_id' => $this->asociacion
        ]);

        /*$vehiculo_chofer = VehiculoChoferes::create(
            [
                'vehiculos_id' => $this->idVehiculo,
                'choferes_id' => $chofer->id
            ]
        );*/
    }

    
    public function nuevoArriero()
    {
        $this->validate(
            [
                'dni_persona' => 'required|min:3|unique:personas,dni',
                'nombre' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'genero' => 'required|numeric|min:0|max:1',
                'telefono' => 'required|min:3',
                'dirección' => 'required|min:3',
                'asociacion' => 'required|min:1',
            ]
        );

        $personas = Personas::create(
            [
                'dni' => $this->dni_persona,
                'nombre' => $this->nombre,
                'apellidos' => $this->apellidos,
                'genero' => $this->genero,
                'telefono' => $this->telefono,
                'dirección' => $this->dirección
            ]
        );
        $arriero = Arrieros::create([
            'persona_id' => $personas->id, 
            'asociaciones_id' => $this->asociacion
        ]);

        /*$vehiculo = VehiculoChoferes::create([
            'vehiculos_id' => $this->idVehiculo,
            'choferes_id' => $chofer->id
        ]);*/

        //$this->resetUI();
    }


    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }


    function resetUI()
    {
        $this->reset([
            'dni_persona', 'nombre', 'apellidos', 'genero', 'telefono', 'telefono', 'dirección',
            'asociacion', 'monto', 'cantidad', 'tipo_de_acemila', 'idPersona', 'idArriero'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoArriero', 'no_existe']);
    }
    
}
