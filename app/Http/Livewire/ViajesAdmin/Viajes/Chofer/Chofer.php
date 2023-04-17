<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Chofer;

use App\Models\Personas;
use App\Models\Viajes\Choferes;
use App\Models\Viajes\TipoLicencias;
use App\Models\Viajes\VehiculoChoferes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chofer extends Component
{
    /** Para buscar Choferes */
    public $idChofer;
    public $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $encontradoComoPersona = false, $encontradoComoChofer = false, $no_existe = false;
    public $dni, $nombre, $apellidos, $genero, $telefono, $dirección;
    public $numero_licencia, $tipo_de_licencia;

    public function resetUI()
    {
        $this->reset([
            'idChofer', 'buscar', 'nombres_apellidos', 'dni_encontrado', 'telefono_arriero', 'idPersona', 
            'encontradoComoPersona', 'encontradoComoChofer', 'no_existe',
            'dni', 'nombre', 'apellidos', 'genero', 'telefono', 'dirección',
            'numero_licencia', 'tipo_de_licencia'
        ]);
    }

    public function render()
    {
        $choferes = DB::table('personas as p')
            ->join('choferes as c', 'c.persona_id', '=', 'p.id')
            ->select(
                DB::raw('CONCAT(p.nombre, " ", p.apellidos) AS datos'),
                'p.dni',
                'c.numero_licencia',
                'c.id as idChofer'
            )
            ->get();
        $tipoLicencias = TipoLicencias::all(['id', 'nombre_tipo']);
        return view('livewire.viajes-admin.viajes.chofer.chofer', compact('choferes', 'tipoLicencias'));
    }


    public function buscarChofer()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        //$this->resetUI();
        $sql = "SELECT * FROM v_viajes_pesonas_choferes
        WHERE dni = '" . $this->dni . "' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->idPersona = $this->buscar[0]->id;
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->telefono_arriero = $this->buscar[0]->telefono;
            $this->encontradoComoPersona = true;

            //$this->encontrado = true;
            if ($this->buscar[0]->idChofer) {
                $this->idChofer = $this->buscar[0]->idChofer;
                $this->encontradoComoChofer = true;
                $this->emit('mensaje-info', 'La persona identificada con DNI: ' . $this->dni . ' ya se encuentra registrada como Chofer');
            }
            $this->reset(['dni']);
        } else {
            session()->flash('message-error', 'No se encontró informacion correspondiente al DNI: ' . $this->dni);
            $this->no_existe = true;
            $this->dni = $this->dni;
            $this->resetValidation();
            $this->reset(['dni']);
        }
    }

    public function guardarPersonaChofer()
    { //Guarda la persona que ya existe y los atributos del Cliente
        $this->validate(
            [
                'numero_licencia' => 'required|min:3',
                'tipo_de_licencia' => 'required|min:0',
            ]
        );
        $chofer = Choferes::create(
            [
                'numero_licencia' => $this->numero_licencia,
                'tipo_licencias_id' => $this->tipo_de_licencia,
                'persona_id' => $this->idPersona
            ]
        );

        $this->resetUI();
    }


    public function NuevoChofer()
    {
        $personas = $this->validate(
            [
                'dni' => 'required|min:3|unique:personas,dni',
                'nombre' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'genero' => 'required|numeric|min:0|max:1',
                'telefono' => 'required|min:3',
                'dirección' => 'required|min:3',
            ]
        );
        $chofer = $this->validate(
            [
                'numero_licencia' => 'required|min:3',
                'tipo_de_licencia' => 'required|min:0',
            ]
        );
        $personas = Personas::crear($personas);
        $chofer = Choferes::create([
            'numero_licencia' => $this->numero_licencia,
            'tipo_licencias_id' => $this->tipo_de_licencia,
            'persona_id' => $personas->id
        ]);

        /*$vehiculo = VehiculoChoferes::create([
            'vehiculos_id' => $this->idVehiculo,
            'choferes_id' => $chofer->id
        ]);*/

        $this->resetUI();
    }


    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }
}
