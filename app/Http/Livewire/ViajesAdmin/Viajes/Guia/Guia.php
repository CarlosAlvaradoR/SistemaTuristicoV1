<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Guia;

use App\Models\Personas;
use App\Models\Viajes\Guias;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Guia extends Component
{
    public $empresa;
    public $numero_placa, $descripcion, $empresa_transportes_id, $tipo_de_vehiculo, $idSeleccionado; //PARA GUARDAR VEHÍCULO
    public $numero_licencia, $tipo_de_licencia;
    public $idVehiculo;

    /** Para buscar Choferes */
    public $idGuia = 0;
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoGuia = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;

    
    public function render()
    {
        $guias = DB::table('personas as p')
            ->join('guias as gui', 'gui.persona_id', '=', 'p.id')
            ->select(
                DB::raw('CONCAT(p.nombre, " ", p.apellidos) AS datos'),
                'p.dni',
                'gui.id as idGuia'
            )
            ->get();

        return view('livewire.viajes-admin.viajes.guia.guia', compact('guias'));
    }

    public function buscarGuia()
    {
        $this->validate(
            ['dni' => 'required|min:3']
        );
        //$this->resetUI();
        $sql = "SELECT * FROM v_viajes_pesonas_guias
        WHERE dni = '" . $this->dni . "' LIMIT 1";

        //dd($this->dni);
        $this->buscar = DB::select($sql);

        if ($this->buscar) {
            $this->idPersona = $this->buscar[0]->id;
            $this->nombres_apellidos = $this->buscar[0]->datos;
            $this->telefono_arriero = $this->buscar[0]->telefono;
            $this->encontradoComoPersona = true;

            //$this->encontrado = true;
            if ($this->buscar[0]->idGuia) {
                $this->idGuia = $this->buscar[0]->idGuia;
                $this->encontradoComoGuia = true;
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

    public function guardarPersonaGuia()
    { //Guarda la persona que ya existe y los atributos del Cliente
        $cocinero = Guias::create(
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
        
        $cocinero = Guias::create(
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
            'asociacion', 'monto', 'cantidad', 'tipo_de_acemila', 'idPersona', 'idGuia'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoGuia', 'no_existe']);
    }
}
