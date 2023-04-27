<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Cocinero;

use App\Models\Personas;
use App\Models\Viajes\Choferes;
use App\Models\Viajes\Cocineros;
use App\Models\Viajes\ViajePaquetesCocineros;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cocinero extends Component
{
    /** Para buscar Choferes */
    public $idCocinero = 0;
    public $buscar, $dni_buscado;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $encontradoComoPersona = false, $encontradoComoCocinero = false, $no_existe = false;
    public $dni, $nombre, $apellidos, $genero, $telefono, $dirección;

    public function resetUI()
    {
        $this->reset([
            'dni', 'nombre', 'apellidos', 'genero', 'telefono', 'dirección',
            'idPersona', 'idCocinero', 'dni', 'nombres_apellidos', 'dni_encontrado',
            'telefono_arriero'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoCocinero', 'no_existe']);
    }

    public function resetear()
    {
        $this->resetUI();
        $this->reset(['dni_buscado']);
    }

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
        $this->resetUI();
        $this->validate(
            ['dni_buscado' => 'required|min:3']
        );
        $this->dni = $this->dni_buscado;
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
                $this->emit('alert', 'ALERTA', 'warning', 'La persona identificada con DNI: ' . $this->dni . ' ya se encuentra registrada como Cocinero');
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

    public function guardarPersonaCocinero()
    { //Guarda la persona que ya existe y los atributos del Cliente
        $cocinero = Cocineros::create(
            [
                'persona_id' => $this->idPersona
            ]
        );

        $this->resetear();
        $this->emit('alert', 'MUY BIEN !', 'success', 'Cocinero Guardado Correctamente.');
    }


    public function NuevoCocinero()
    {
        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Chófer Registrado Correctamente';
        $val = '';
        if ($this->no_existe && $this->idPersona) {
            $val = ',' . $this->idPersona;
        }
        $personas = $this->validate(
            [
                'dni' => 'required|min:3|unique:personas,dni' . $val,
                'nombre' => 'required|min:3',
                'apellidos' => 'required|min:3',
                'genero' => 'required|numeric|min:1|max:2',
                'telefono' => 'required|min:3',
                'dirección' => 'required|min:3',
            ]
        );

        if ($this->no_existe && $this->idPersona) {
            $personas = Personas::findOrFail($this->idPersona);
            $personas->dni = $this->dni;
            $personas->nombre = $this->nombre;
            $personas->apellidos = $this->apellidos;
            $personas->genero = $this->genero;
            $personas->telefono = $this->telefono;
            $personas->dirección = $this->dirección;
            $personas->save();
            $text = 'Información del Cocinero Actualizada Correctamente.';
            $this->emit('close-modal');
        } else {
            $personas = Personas::crear($personas);
            $cocinero = Cocineros::create(
                [
                    'persona_id' => $personas->id
                ]
            );
        }

        $this->emit('alert', $title, $icon, $text);
        $this->resetear();
    }

    public function Edit(Cocineros $cocinero)
    {
        //dd($cocinero);
        $personas = Personas::where('id', $cocinero->persona_id)->limit(1)->get();
        $this->idPersona = $personas[0]->id;
        $this->dni = $personas[0]->dni;
        $this->nombre = $personas[0]->nombre;
        $this->apellidos = $personas[0]->apellidos;
        $this->genero = $personas[0]->genero;
        $this->telefono = $personas[0]->telefono;
        $this->dirección = $personas[0]->dirección;

        $this->idCocinero = $cocinero->id;


        $this->no_existe = true;

        $this->emit('show-modal');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-cocineros', [
            'title' => 'Está seguro que desea eliminar al Cocinero ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    protected $listeners = ['deleteCocineros'];
    public function deleteCocineros(Cocineros $cocinero, $opcion)
    {
        //$personas = Personas::findOrFail($cocinero->id);
        # Elimiar ambos
        # Eliminar como chófer y no como persona si esque la persona está en otras tablas (BUSCAR LA PERSONA EN TABLAS DIFERENTES)

        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Se eliminó correctamente la Información del Cocinero';
        $viaje_paquete_cocineros = ViajePaquetesCocineros::where('cocinero_id', $cocinero->id)->get();
        if ($opcion == 1) {
            $personas = Personas::verificaQueExista($cocinero->persona_id, 2);
            #dd($personas);
            if ($personas == 1) { //QUIERE DECIR QUE LA PERSONA CON ESE ID TIENE REGISTROS EN DIFERENTES CAMPOS
                $title = 'ERROR';
                $icon = 'error';
                $text = 'No se puede Eliminar la Información porque la misma se encuentra registrada en otro módulo.';
                $this->emit('alert', $title, $icon, $text);
                return;
            } else {
                if (count($viaje_paquete_cocineros) > 0) {
                    $title = 'ERROR!';
                    $icon = 'error';
                    $text = 'No se puede Eliminar la Información del Cocinero la misma se encuentra registrada en otro módulo.';
                    $this->emit('alert', $title, $icon, $text);
                    return;
                } else {
                    $cocinero->delete();
                    $personas = Personas::findOrFail($cocinero->persona_id);
                    $personas->delete();
                    $this->emit('alert', $title, $icon, $text);
                }
            }
        } else {
            if (count($viaje_paquete_cocineros) > 0) {
                $title = 'ERROR!';
                $icon = 'error';
                $text = 'No se puede Eliminar la Información del Cocinero la misma se encuentra registrada en otro módulo.';
                $this->emit('alert', $title, $icon, $text);
                return;
            } else {
                $cocinero->delete();
                $this->emit('alert', $title, $icon, $text);
            }
        }
    }

    public function updated($name, $value)
    {
        $this->resetValidation($name);
        $this->resetErrorBag($name);
    }
}
