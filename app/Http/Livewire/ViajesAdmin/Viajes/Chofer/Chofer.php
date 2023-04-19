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
    public $dni_buscado;
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

    public function resetear()
    {
        $this->resetUI();
        $this->reset(['dni_buscado']);
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
        $this->resetUI();
        $this->validate(
            ['dni_buscado' => 'required|min:3']
        );
        $this->dni = $this->dni_buscado;
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
                $this->emit('alert', 'ALERTA', 'warning', 'La persona identificada con DNI: ' . $this->dni . ' ya se encuentra registrada como Chofer');
            }
            $this->reset(['dni']);
        } else {
            $this->emit('alert', 'ALERTA!', 'warning', 'No se encontró informacion correspondiente al DNI: ' . $this->dni);
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
                'tipo_de_licencia' => 'required|numeric|min:1',
            ]
        );

        $chofer = Choferes::create(
            [
                'numero_licencia' => $this->numero_licencia,
                'tipo_licencias_id' => $this->tipo_de_licencia,
                'persona_id' => $this->idPersona
            ]
        );

        $this->resetear();
        $this->emit('alert', 'MUY BIEN', 'success', 'Chófer Añadido Correctamente');
        /*$this->resetUI();
        $this->reset(['dni_buscado']);*/
    }


    public function NuevoChofer()
    {
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Chófer Registrado Correctamente';
        $val = '';
        if ($this->no_existe && $this->idPersona) {
            $val = ','.$this->idPersona;
        }

        $personas = $this->validate(
            [
                'dni' => 'required|min:3|unique:personas,dni'.$val,
                'nombre' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'genero' => 'required|numeric|min:1|max:2',
                'telefono' => 'required|min:3',
                'dirección' => 'required|min:3',
            ]
        );
        $chofer = $this->validate(
            [
                'numero_licencia' => 'required|min:3',
                'tipo_de_licencia' => 'required|numeric|min:1',
            ]
        );

        if ($this->no_existe && $this->idPersona) {
            #UPDATE
            $personas = Personas::findOrFail($this->idPersona);
            $personas->dni = $this->dni;
            $personas->nombre = $this->nombre;
            $personas->apellidos = $this->apellidos;
            $personas->genero = $this->genero;
            $personas->telefono = $this->telefono;
            $personas->dirección = $this->dirección;
            $personas->save();

            $chofer = Choferes::findOrFail($this->idChofer);
            $chofer->numero_licencia= $this->numero_licencia;
            $chofer->tipo_licencias_id= $this->tipo_de_licencia;
            $chofer->save();
            $text = 'Información del Chófer Actualizada Correctamente.';
            $this->emit('close-modal');
        } else {
            #INSERT
            $personas = Personas::crear($personas);
            $chofer = Choferes::create([
                'numero_licencia' => $this->numero_licencia,
                'tipo_licencias_id' => $this->tipo_de_licencia,
                'persona_id' => $personas->id
            ]);
        }

        $this->resetear();
        $this->emit('alert', $title, $icon, $text);
    }

    public function Edit(Choferes $chofer)
    {
        //dd($chofer);

        $personas = Personas::where('id', $chofer->persona_id)->limit(1)->get();
        $this->idPersona = $personas[0]->id;
        $this->dni = $personas[0]->dni;
        $this->nombre = $personas[0]->nombre;
        $this->apellidos = $personas[0]->apellidos;
        $this->genero = $personas[0]->genero;
        $this->telefono = $personas[0]->telefono;
        $this->dirección = $personas[0]->dirección;

        $this->idChofer = $chofer->id;
        $this->numero_licencia = $chofer->numero_licencia;
        $this->tipo_de_licencia = $chofer->tipo_licencias_id;

        $this->no_existe = true;

        $this->emit('show-modal');
    }

    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }
}
