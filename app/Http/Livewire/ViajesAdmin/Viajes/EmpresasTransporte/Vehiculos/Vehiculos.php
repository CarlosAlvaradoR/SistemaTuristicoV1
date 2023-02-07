<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\EmpresasTransporte\Vehiculos;

use App\Models\Personas;
use App\Models\Viajes\Choferes;
use App\Models\Viajes\EmpresaTransportes;
use App\Models\Viajes\TipoLicencias;
use App\Models\Viajes\TipoVehiculos;
use App\Models\Viajes\VehiculoChoferes;
use App\Models\Viajes\Vehiculos as ViajesVehiculos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Vehiculos extends Component
{
    public $empresa;
    public $numero_placa, $descripcion, $empresa_transportes_id, $tipo_de_vehiculo, $idSeleccionado; //PARA GUARDAR VEHÍCULO
    public $numero_licencia, $tipo_de_licencia;
    public $idVehiculo;

    /** Para buscar Choferes */
    public $idChofer = 0;
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoChofer = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;


    public function mount(EmpresaTransportes $empresa)
    {
        $this->empresa = $empresa;
    }

    public function render()
    {
        $tipoVehiculos = TipoVehiculos::all(['id', 'nombre_tipo']);
        $tipoLicencias = TipoLicencias::all(['id', 'nombre_tipo']);
        $vehiculos = DB::table('empresa_transportes as et')
            ->join('vehiculos as v', 'v.empresa_transportes_id', '=', 'et.id')
            ->select(
                'et.nombre_empresa',
                'v.numero_placa',
                'v.descripcion',
                'v.id'
            )
            ->where('v.empresa_transportes_id', $this->empresa->id)
            ->get();
        return view(
            'livewire.viajes-admin.viajes.empresas-transporte.vehiculos.vehiculos',
            compact('tipoVehiculos', 'vehiculos', 'tipoLicencias')
        );
    }

    public function guardarVehículo()
    {
        $vehiculos = ViajesVehiculos::create([
            'numero_placa' => $this->numero_placa,
            'descripcion' => $this->descripcion,
            'empresa_transportes_id' => $this->empresa->id,
            'tipo_vehiculos_id' => $this->tipo_de_vehiculo
        ]);
    }

    public function Edit(ViajesVehiculos $viajes)
    {
        $this->idSeleccionado = $viajes->id;
        $this->numero_placa = $viajes->numero_placa;
        $this->descripcion = $viajes->descripcion;
        $this->tipo_de_vehiculo = $viajes->tipo_vehiculos_id;

        $this->emit('show-modal', 'show modal!');
    }

    public function Actualizar()
    {
        $vehiculo = ViajesVehiculos::findOrFail($this->idSeleccionado);
        $vehiculo->numero_placa = $this->numero_placa;
        $vehiculo->descripcion = $this->descripcion;
        $vehiculo->tipo_vehiculos_id = $this->tipo_de_vehiculo;

        $vehiculo->save();
        $this->emit('close-modal', 'show modal!');
    }


    public function modalNuevoChofer($idViaje)
    {
        $this->idVehiculo = $idViaje;
        $this->emit('show-modal', 'show modal!');
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

    public function guardarPersonaCliente()
    { //Guarda la persona que ya existe y los atributos del Cliente
        $chofer = Choferes::create(
            [
                'numero_licencia' => $this->numero_licencia,
                'tipo_licencias_id' => $this->tipo_de_licencia,
                'persona_id' => $this->idPersona
            ]
        );

        $vehiculo_chofer = VehiculoChoferes::create(
            [
                'vehiculos_id' => $this->idVehiculo,
                'choferes_id' => $chofer->id
            ]
        );
    }

    public function agregarChoferAlVehiculo()
    {
        $vehiculo_chofer = VehiculoChoferes::create(
            [
                'vehiculos_id' => $this->idVehiculo,
                'choferes_id' => $this->idChofer
            ]
        );
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
        $chofer = Choferes::create([
            'numero_licencia' => $this->numero_licencia,
            'tipo_licencias_id' => $this->tipo_de_licencia,
            'persona_id' => $personas->id
        ]);

        $vehiculo = VehiculoChoferes::create([
            'vehiculos_id' => $this->idVehiculo,
            'choferes_id' => $chofer->id
        ]);

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
            'asociacion', 'monto', 'cantidad', 'tipo_de_acemila', 'idPersona', 'idChofer'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoChofer', 'no_existe']);
    }
}
