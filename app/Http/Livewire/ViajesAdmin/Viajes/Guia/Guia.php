<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Guia;

use App\Models\Personas;
use App\Models\Viajes\Guias;
use App\Models\Viajes\ViajePaquetesGuias;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Guia extends Component
{
    /** Para buscar Choferes */
    public $idGuia;
    public $dni, $buscar, $dni_buscado;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $encontradoComoPersona = false, $encontradoComoGuia = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;

    public function resetUI()
    {
        $this->reset([
            'idGuia', 'dni', 'apellidos', 'genero', 'telefono', 'dirección',
            'idPersona', 'dni', 'nombres_apellidos', 'dni_encontrado',
            'telefono_arriero', 'nombre', 'apellidos', 'genero', 'telefono', 'dirección'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoGuia', 'no_existe']);
    }

    public function resetear()
    {
        $this->resetUI();
        $this->reset(['dni_buscado']);
    }


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
        $this->resetUI();
        $this->validate(
            ['dni_buscado' => 'required|min:3']
        );
        $this->dni = $this->dni_buscado;
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
                $this->emit('alert', 'ALERTA', 'warning', 'La persona identificada con DNI: ' . $this->dni . ' ya se encuentra registrada como Guía');
            }
            $this->reset(['dni']);
        } else {
            $this->emit('alert', 'ALERTA!', 'warning', 'No se encontró informacion correspondiente al DNI: ' . $this->dni);
            $this->no_existe = true;
            $this->dni_persona = $this->dni;
            $this->resetValidation();
            $this->reset(['dni']);
        }
    }

    public function guardarPersonaGuia()
    { //Guarda la persona que ya existe y los atributos del Cliente
        $guias = Guias::create(
            [
                'persona_id' => $this->idPersona
            ]
        );

        $this->resetear();
        $this->emit('alert', 'MUY BIEN !', 'success', 'Guía Guardado Correctamente.');
    }


    public function NuevoGuia()
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
            $text = 'Información del Guía Actualizada Correctamente.';
            $this->emit('close-modal');
        } else {
            $personas = Personas::crear($personas);

            $guias = Guias::create(
                [
                    'persona_id' => $personas->id
                ]
            );
        }



        $this->emit('alert', $title, $icon, $text);
        $this->resetear();
    }

    public function Edit(Guias $guias)
    {
        //dd($guias);
        $personas = Personas::where('id', $guias->persona_id)->limit(1)->get();
        $this->idPersona = $personas[0]->id;
        $this->dni = $personas[0]->dni;
        $this->nombre = $personas[0]->nombre;
        $this->apellidos = $personas[0]->apellidos;
        $this->genero = $personas[0]->genero;
        $this->telefono = $personas[0]->telefono;
        $this->dirección = $personas[0]->dirección;

        $this->idGuia = $guias->id;


        $this->no_existe = true;

        $this->emit('show-modal');
    }


    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-guias', [
            'title' => 'Está seguro que desea eliminar al Guía ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    protected $listeners = ['deleteGuias'];
    public function deleteGuias(Guias $guias)
    {
        //$personas = Personas::findOrFail($guias->id);
        # Elimiar ambos
        # Eliminar como chófer y no como persona si esque la persona está en otras tablas (BUSCAR LA PERSONA EN TABLAS DIFERENTES)

        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Se eliminó correctamente la Información del Guía';
        $viaje_paquete_guias = ViajePaquetesGuias::where('guias_id', $guias->id)->get();

        $personas = Personas::verificaQueExista($guias->persona_id, 4);
        #dd($personas);
        if ($personas == 1) { //QUIERE DECIR QUE LA PERSONA CON ESE ID TIENE REGISTROS EN DIFERENTES CAMPOS
            $title = 'ERROR';
            $icon = 'error';
            $text = 'No se puede Eliminar la Información porque la misma se encuentra registrada en otro módulo.';
            $this->emit('alert', $title, $icon, $text);
            return;
        } else {
            if (count($viaje_paquete_guias) > 0) {
                $title = 'ERROR!';
                $icon = 'error';
                $text = 'No se puede Eliminar la Información del Chófer la misma se encuentra registrada en otro módulo.';
                $this->emit('alert', $title, $icon, $text);
                return;
            } else {
                $guias->delete();
                $personas = Personas::findOrFail($guias->persona_id);
                $personas->delete();
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
