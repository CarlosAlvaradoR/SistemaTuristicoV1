<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\EmpresasTransporte\Vehiculos;

use App\Models\Personas;
use App\Models\Viajes\Choferes;
use App\Models\Viajes\EmpresaTransportes;
use App\Models\Viajes\TipoLicencias;
use App\Models\Viajes\TipoVehiculos;
use App\Models\Viajes\TrasladoViajes;
use App\Models\Viajes\VehiculoChoferes;
use App\Models\Viajes\Vehiculos as ViajesVehiculos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Vehiculos extends Component
{
    public $title = 'CREAR NUEVOS VEHÍCULOS';
    public $empresa;
    public $numero_placa, $descripcion, $empresa_transportes_id, $tipo_de_vehiculo, $idSeleccionado; //PARA GUARDAR VEHÍCULO
    public $numero_licencia, $tipo_de_licencia;
    public $idVehiculo;

    /** Para buscar Choferes */
    public $idChofer = 0;
    public $dni, $buscar;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    //public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoChofer = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;
    public $mostrarEnlace = false;

    public function resetUI()
    {
        # 1 es resetear todo lo que se busca y se guarda, Lo otro para conservar opciones

        $this->reset([
            'idVehiculo', 'title', 'numero_placa', 'descripcion', 'empresa_transportes_id', 'tipo_de_vehiculo', 'idSeleccionado',
            'numero_licencia', 'tipo_de_licencia', 'mostrarEnlace'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoChofer', 'no_existe', 'idVehiculo']);
    }

    public function mount(EmpresaTransportes $empresa)
    {
        $this->empresa = $empresa;
    }

    public function render()
    {
        $choferes = [];
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
        if ($this->idVehiculo) {
            $choferes = DB::select("SELECT p.nombre, p.apellidos, v.id, ch.id as idVehiculoChofer, vc.id as idVChofer FROM personas p
            INNER JOIN choferes ch on p.id = ch.persona_id
            INNER JOIN vehiculo_choferes vc on vc.choferes_id = ch.id
            INNER JOIN vehiculos v on v.id = vc.vehiculos_id
            WHERE v.id = " . $this->idVehiculo . "");
        }
        return view('livewire.viajes-admin.viajes.empresas-transporte.vehiculos.vehiculos',
            compact('tipoVehiculos', 'vehiculos', 'tipoLicencias', 'choferes')
        );
    }

    public function abrirModalVehiculo()
    {
        $this->emit('show-modal');
    }


    public function guardarVehículo()
    {
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Información del Vehículo Añadida Correctamente.';
        $this->validate(
            [
                'numero_placa' => 'required|min:3|max:10',
                'descripcion' => 'required|string|min:5',
                'tipo_de_vehiculo' => 'required|numeric|min:1',
            ]
        );

        if ($this->idSeleccionado) { //id Del Vehículo
            $vehiculo = ViajesVehiculos::findOrFail($this->idSeleccionado);
            $vehiculo->numero_placa = $this->numero_placa;
            $vehiculo->descripcion = $this->descripcion;
            $vehiculo->tipo_vehiculos_id = $this->tipo_de_vehiculo;

            $vehiculo->save();
            $text = 'Información del Vehículo Actualizada Correctamente.';
            $this->emit('close-modal', 'show modal!');
        } else {
            $vehiculos = ViajesVehiculos::create([
                'numero_placa' => $this->numero_placa,
                'descripcion' => $this->descripcion,
                'empresa_transportes_id' => $this->empresa->id,
                'tipo_vehiculos_id' => $this->tipo_de_vehiculo
            ]);
        }
        $this->emit('alert', $title, $icon, $text);
        $this->resetUI();
    }

    public function Edit(ViajesVehiculos $viajes)
    {
        $this->idSeleccionado = $viajes->id;
        $this->numero_placa = $viajes->numero_placa;
        $this->descripcion = $viajes->descripcion;
        $this->tipo_de_vehiculo = $viajes->tipo_vehiculos_id;

        $this->emit('show-modal', 'show modal!');
    }



    public function modalNuevoChofer($idVehiculo)
    {
        $this->idVehiculo = $idVehiculo;

        $this->title = 'AÑADIR CHÓFER AL VEHÍCULO';
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
            } else {
                $this->emit('alert', 'ALERTA !', 'warning', 'No se encontró Informacióncorrespondiente al DNI: ' . $this->dni);
                $this->mostrarEnlace = true;
            }
            $this->reset(['dni']);
        } else {
            $this->emit('alert', 'ALERTA !', 'warning', 'No se encontró Informacióncorrespondiente al DNI: ' . $this->dni);
            $this->no_existe = true;
            $this->dni_persona = $this->dni;
            $this->mostrarEnlace = true;
            $this->resetValidation();
            $this->reset(['dni']);
        }
    }


    public function agregarChoferAlVehiculo()
    {
        $vehiculo_chofer = VehiculoChoferes::create(
            [
                'vehiculos_id' => $this->idVehiculo,
                'choferes_id' => $this->idChofer
            ]
        );
        $this->reset(['encontradoComoChofer', 'nombres_apellidos', 'dni_encontrado', 'telefono_arriero', 'idPersona']);
        $this->emit('alert', 'ALERTA !', 'success', 'Chófer Añadido Correctamente al Vehículo.');

        //$this->resetUI();
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-vehiculos', [
            'title' => 'Está seguro que desea eliminar el Vehículo ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    protected $listeners = ['deleteVehiculos', 'deleteVehiculosChofer'];
    public function deleteVehiculos(ViajesVehiculos $vehiculo)
    {
        //dd('HOOLA MUNDOS');
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Vehículo Eliminado Correctamente';

        $trasladoViajes = TrasladoViajes::where('vehiculos_id', $vehiculo->id)->get();
        $vehiculo_choferes = VehiculoChoferes::where('vehiculos_id', $vehiculo->id)->get();

        //dd($vehiculo);
        if (count($trasladoViajes) > 0 || count($vehiculo_choferes) > 0) {
            $title = 'ERROR !';
            $icon = 'error';
            $text = 'No se puede Eliminar el Vehículo porque ya se usó la misma em otros módulos.';
            $this->emit('alert', $title, $icon, $text);
            return;
        } else {
            $vehiculo->delete();
            $this->emit('alert', $title, $icon, $text);
        }
    }


    public function deleteConfirmChoferes($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-vehiculosChoferes', [
            'title' => 'Está seguro que desea quitar al Chófer del Vehículo ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    //protected $listeners = ['deleteVehiculos'];
    public function deleteVehiculosChofer(VehiculoChoferes $vehiculo)
    {
        // dd($vehiculo);
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Chofer Quitado del Vehículo con Éxito';
        $vehiculo->delete();
        $this->emit('alert', $title, $icon, $text);
    }

    // public function NuevoChofer()
    // {
    //     $this->validate(
    //         [
    //             'dni' => 'required|min:3|unique:personas',
    //             'nombre' => 'required',
    //             'apellidos' => 'required',
    //             'genero' => 'required|numeric|min:1|max:2',
    //             'telefono' => 'required',
    //             'dirección' => 'required',
    //         ]
    //     );
    //     $this->validate(
    //         [
    //             'numero_licencia' => 'required|string|min:3',
    //             'tipo_de_licencia' => 'required|numeric|min:1',
    //         ]
    //     );

    //     $personas = Personas::create(
    //         [
    //             'dni' => $this->dni,
    //             'nombre' => $this->nombre,
    //             'apellidos' => $this->apellidos,
    //             'genero' => $this->genero,
    //             'telefono' => $this->telefono,
    //             'dirección' => $this->dirección
    //         ]
    //     );
    //     $chofer = Choferes::create([
    //         'numero_licencia' => $this->numero_licencia,
    //         'tipo_licencias_id' => $this->tipo_de_licencia,
    //         'persona_id' => $personas->id
    //     ]);

    //     $vehiculo = VehiculoChoferes::create([
    //         'vehiculos_id' => $this->idVehiculo,
    //         'choferes_id' => $chofer->id
    //     ]);
    //     $this->resetUI(1);
    // }


    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }
}
