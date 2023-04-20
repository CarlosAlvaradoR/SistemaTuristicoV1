<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\Arriero;

use App\Models\Personas;
use App\Models\Viajes\AcemilasAlquiladas;
use App\Models\Viajes\Arrieros;
use App\Models\Viajes\Asociaciones;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Arriero extends Component
{


    public $idArriero = 0;
    public $dni, $buscar, $dni_buscado;
    public $nombres_apellidos, $dni_encontrado, $telefono_arriero, $idPersona;
    public $asociacion;
    public $encontradoComoPersona = false, $encontradoComoArriero = false, $no_existe = false;
    public $dni_persona, $nombre, $apellidos, $genero, $telefono, $dirección;
    public function resetUI()
    {
        $this->reset([
            'idArriero', 'dni', 'apellidos', 'genero', 'telefono', 'dirección',
            'idPersona', 'asociacion', 'nombres_apellidos', 'dni_encontrado', 'telefono_arriero',
            'telefono_arriero', 'nombre', 'apellidos', 'genero', 'telefono', 'dirección'
        ]);
        $this->reset(['buscar', 'encontradoComoPersona', 'encontradoComoArriero', 'no_existe']);
    }

    public function resetear()
    {
        $this->resetUI();
        $this->reset(['dni_buscado']);
    }

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
        $this->resetUI();
        $this->validate(
            ['dni_buscado' => 'required|min:3']
        );
        $this->dni = $this->dni_buscado;
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

        $this->resetear();
        $this->emit('alert', 'MUY BIEN !', 'success', 'Arriero Guardado Correctamente.');
    }


    public function nuevoArriero()
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

        $asociaciones = $this->validate(
            [
                'asociacion' => 'required|numeric|min:1',
            ]
        );

        if ($this->no_existe && $this->idPersona) {
            $personas = Personas::findOrFail($this->idPersona);
            $arriero = Arrieros::findOrFail($this->idArriero);
            $personas->dni = $this->dni;
            $personas->nombre = $this->nombre;
            $personas->apellidos = $this->apellidos;
            $personas->genero = $this->genero;
            $personas->telefono = $this->telefono;
            $personas->dirección = $this->dirección;
            $personas->save();
            $arriero->asociaciones_id = $this->asociacion;
            $arriero->save();
            $text = 'Información del Guía Actualizada Correctamente.';
            $this->emit('close-modal');
        } else {
            $personas = Personas::crear($personas);

            $arriero = Arrieros::create([
                'persona_id' => $personas->id,
                'asociaciones_id' => $this->asociacion
            ]);
        }

        $this->emit('alert', $title, $icon, $text);
        $this->resetear();

    }

    public function Edit(Arrieros $arrieros)
    {
        //dd($arrieros);
        $personas = Personas::where('id', $arrieros->persona_id)->limit(1)->get();
        $this->idPersona = $personas[0]->id;
        $this->dni = $personas[0]->dni;
        $this->nombre = $personas[0]->nombre;
        $this->apellidos = $personas[0]->apellidos;
        $this->genero = $personas[0]->genero;
        $this->telefono = $personas[0]->telefono;
        $this->dirección = $personas[0]->dirección;

        $this->idArriero = $arrieros->id;
        $this->asociacion = $arrieros->asociaciones_id;


        $this->no_existe = true;

        $this->emit('show-modal');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-guias', [
            'title' => 'Está seguro que desea eliminar al Arriero ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    protected $listeners = ['deleteArrieros'];
    public function deleteArrieros(Arrieros $arrieros)
    {
        dd($arrieros);
        //$personas = Personas::findOrFail($arrieros->id);
        # Elimiar ambos
        # Eliminar como chófer y no como persona si esque la persona está en otras tablas (BUSCAR LA PERSONA EN TABLAS DIFERENTES)

        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Se eliminó correctamente la Información del Guía';
        $viaje_paquete_guias = AcemilasAlquiladas::where('arrieros_id', $arrieros->id)->get();

        $personas = Personas::verificaQueExista($arrieros->persona_id, 3);
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
                $arrieros->delete();
                $personas = Personas::findOrFail($arrieros->persona_id);
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
