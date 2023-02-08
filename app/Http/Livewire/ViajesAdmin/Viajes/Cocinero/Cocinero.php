<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Cocinero;

use App\Models\Personas;
use App\Models\Viajes\Choferes;
use App\Models\Viajes\Cocineros;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cocinero extends Component
{
    public $empresa;
    public $numero_placa, $descripcion, $empresa_transportes_id, $tipo_de_vehiculo, $idSeleccionado; //PARA GUARDAR VEHÍCULO
    public $numero_licencia, $tipo_de_licencia;
    public $idVehiculo;

    /** Para buscar Choferes */
    public $idCocinero = 0;
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoCocinero = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;

    
    public function render()
    {
        $cocineros = DB::table('personas as p')
            ->join('cocineros as co', 'co.persona_id', '=', 'p.id')
            ->select(
                DB::raw('CONCAT(p.nombre, " ", p.apellidos) AS datos'),
                'p.dni',
                'co.id as idCocinero'
            )
            ->get();
        return view('livewire.viajes-admin.viajes.cocinero.cocinero', compact('cocineros'));
    }

    public function buscarCocinero()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        //$this->resetUI();
        $sql = "SELECT * FROM v_viajes_pesonas_cocineros
        WHERE dni = '" . $this->dni . "' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->idPersona = $this->buscar[0]->id;
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->telefono_arriero = $this->buscar[0]->telefono;
            $this->encontradoComoPersona = true;

            //$this->encontrado = true;
            if ($this->buscar[0]->idCocinero) {
                $this->idCocinero = $this->buscar[0]->idCocinero;
                $this->encontradoComoCocinero = true;
                $this->emit('mensaje-info', 'La persona identificada con DNI: ' . $this->dni . ' ya se encuentra registrada como Cocinero');
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

    public function guardarPersonaCocinero()
    { //Guarda la persona que ya existe y los atributos del Cliente
        $cocinero = Cocineros::create(
            [
                'persona_id' => $this->idPersona
            ]
        );

        /*$vehiculo_chofer = VehiculoChoferes::create(
            [
                'vehiculos_id' => $this->idVehiculo,
                'choferes_id' => $chofer->id
            ]
        );*/
    }

    
    public function NuevoChofer()
    {
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
        
        $cocinero = Cocineros::create(
            [
                'persona_id' => $personas->id
            ]
        );

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
            'asociacion', 'monto', 'cantidad', 'tipo_de_acemila', 'idPersona', 'idCocinero'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoCocinero', 'no_existe']);
    }
}
