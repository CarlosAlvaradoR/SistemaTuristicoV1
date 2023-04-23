<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes;

use App\Models\PaquetesTuristicos;
use App\Models\Viajes\AcemilasAlquiladas;
use App\Models\Viajes\ActividadesAclimataciones;
use App\Models\Viajes\AlmuerzoCelebraciones;
use App\Models\Viajes\Hospedajes;
use App\Models\Viajes\ItinerariosCumplidos;
use App\Models\Viajes\PagoBoletosViajes;
use App\Models\Viajes\Participantes;
use App\Models\Viajes\TrasladoViajes;
use App\Models\Viajes\ViajePaquetes;
use App\Models\Viajes\ViajePaquetesCocineros;
use App\Models\Viajes\ViajePaquetesGuias;
use Livewire\Component;
use Illuminate\Support\Str;

class Viajes extends Component
{
    public $paquete, $search;
    public $descripcion, $fecha, $hora, $cantidad_participantes, $estado, $paquete_id;
    public $fecha_inicial, $fecha_final;

    public $title = 'CREAR VIAJES DEL PAQUETE', $idViajePaquete;

    protected $listeners = ['deleteViaje'];

    public function resetUI()
    {
        $this->reset(['descripcion', 'fecha', 'hora', 'cantidad_participantes', 'estado', 'idViajePaquete', 'title']);
    }

    public function mount(PaquetesTuristicos $paquete)
    {
        $this->paquete = $paquete;
    }

    public function render()
    {
        $viajes = ViajePaquetes::where('paquete_id', '=', $this->paquete->id)
            ->where('slug', 'like', '%' . $this->search . '%')
            ->get();
        //dd($viajes);
        return view('livewire.viajes-admin.viajes.viajes', compact('viajes'));
    }

    public function saveViaje()
    {
        $this->validate([
            'descripcion' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'estado' => 'required|numeric|min:1|max:3',
            'cantidad_participantes' => 'required',
        ]);

        if ($this->idViajePaquete) {
            $viaje = ViajePaquetes::findOrFail($this->idViajePaquete);
            $viaje->descripcion = $this->descripcion;
            $viaje->fecha = $this->fecha;
            $viaje->hora = $this->hora;
            $viaje->estado = $this->estado;
            $viaje->cantidad_participantes = $this->cantidad_participantes;
            $viaje->save();
            $title = 'MUY BIEN !';
            $icon = 'success';
            $text = 'Viaje Actualizado Correctamente';

            $this->emit('close-modal-pago-servicio', 'Edicion de Atractivos');
        } else {
            $viaje = ViajePaquetes::create([
                'descripcion' => $this->descripcion,
                'fecha' => $this->fecha,
                'hora' => $this->hora,
                'cantidad_participantes' => $this->cantidad_participantes,
                'estado' => $this->estado,
                'cod_string' => strval(random_int(100000, 999999)),
                'paquete_id' => $this->paquete->id
            ]);
            $title = 'MUY BIEN !';
            $icon = 'success';
            $text = 'Viaje Registrado Correctamente';
        }
        $this->resetUI();
        $this->alert($title, $icon, $text);
    }

    public function Edit(ViajePaquetes $viaje)
    {
        //dd($viaje);
        $this->title = 'EDITAR VIAJE DEL PAQUETE';
        $this->idViajePaquete = $viaje->id;
        $this->descripcion = $viaje->descripcion;
        $this->fecha = $viaje->fecha;
        $this->hora = $viaje->hora;
        $this->cantidad_participantes = $viaje->cantidad_participantes;
        $this->estado = $viaje->estado;
        $this->emit('show-modal-viaje-paquete', 'Edicion de Viaje Paquete');
    }


    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirm-Viaje', [
            'title' => 'Estás seguro que deseas eliminar el Viaje ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteViaje(ViajePaquetes $viaje)
    {

        $itinerarios_cumplidos = ItinerariosCumplidos::where('viaje_paquetes_id', $viaje->id)->get();
        $traslado_viajes = TrasladoViajes::where('viaje_paquetes_id', $viaje->id)->get();
        $pago_boletas_viaje = PagoBoletosViajes::where('viaje_paquetes_id', $viaje->id)->get();
        $actividades_aclimataciones = ActividadesAclimataciones::where('viaje_paquetes_id', $viaje->id)->get();
        $participantes = Participantes::where('viaje_paquetes_id', $viaje->id)->get();
        $viaje_paquete_cocineros = ViajePaquetesCocineros::where('viaje_paquetes_id', $viaje->id)->get();
        $viaje_paquete_arrieros = AcemilasAlquiladas::where('viaje_paquetes_id', $viaje->id)->get();
        $viaje_paquete_guias = ViajePaquetesGuias::where('viaje_paquetes_id', $viaje->id)->get();
        $hospedajes = Hospedajes::where('viaje_paquetes_id', $viaje->id)->get();
        $almuerzo_celebraciones = AlmuerzoCelebraciones::where('viaje_paquetes_id', $viaje->id)->get();
        if (
            count($itinerarios_cumplidos) > 0 || count($traslado_viajes) > 0 || count($pago_boletas_viaje) > 0
            || count($actividades_aclimataciones) > 0 || count($participantes) > 0 || count($viaje_paquete_cocineros) > 0
            || count($viaje_paquete_arrieros) > 0 || count($viaje_paquete_guias) > 0 || count($hospedajes) > 0
            || count($almuerzo_celebraciones) > 0
        ) {
            $this->alert('ERROR', 'error', 'No se puede Eliminar el Registro porque está contenida la información de la misma en uno o varios Módulos.');
            return;
        }

        $viaje->delete();
        $this->alert('MUY BIEN !', 'success', 'Viaje Eliminado de forma Correcta');
    }

    function alert($title, $icon, $text)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }
}
