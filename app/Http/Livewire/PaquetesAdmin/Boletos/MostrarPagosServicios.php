<?php

namespace App\Http\Livewire\PaquetesAdmin\Boletos;

use Livewire\Component;
use App\Models\BoletosPagarPaquetes;
use Illuminate\Support\Facades\DB;

class MostrarPagosServicios extends Component
{
    public $idPaquete;
    public $descripcion, $precio;
    public $title = 'CREAR PAGOS POR SERVICIO', $idBoletosPagosServicios, $edicion = false;

    protected $listeners = ['quitarPagos'];

    protected $rules = [
        'descripcion' => 'required',
        'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/'
    ];

    function resetUI(){
        $this->reset(['descripcion','precio','title','idBoletosPagosServicios','edicion']);
        $this->resetValidation();
    }

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        // $pagos = DB::select('SELECT id, descripcion, precio, paquete_id FROM boletos_pagar_paquetes
        // WHERE paquete_id = ' . $this->idPaquete . '');
        $pagos = BoletosPagarPaquetes::where('paquete_id', $this->idPaquete)->get();
        return view('livewire.paquetes-admin.boletos.mostrar-pagos-servicios', compact('pagos'));
    }

    public function guardarPagosServiciosPaquete()
    {
        $this->validate();
        $pagos = BoletosPagarPaquetes::create([
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'paquete_id' => $this->idPaquete
        ]);

        $this->resetUI();
        $this->emit('alert', 'MUY BIEN', 'success', 'Pago por servicio añadido correctamente.');
    }

    public function Edit(BoletosPagarPaquetes $boleto)
    {
        $this->title = 'EDITAR PAGOS POR SERVICIO';
        $this->idBoletosPagosServicios = $boleto->id;
        $this->descripcion = $boleto->descripcion;
        $this->precio = $boleto->precio;
        $this->edicion = true;
        $this->emit('show-modal-pago-servicio', 'Edicion de Pagos de Servicio');
    }

    public function Update()
    {
        $this->validate([
            'descripcion' => 'required',
            'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $boleto = BoletosPagarPaquetes::findOrFail($this->idBoletosPagosServicios);
        $boleto->descripcion = $this->descripcion;
        $boleto->precio = $this->precio;
        $boleto->save();

        $this->emit('alert', 'MUY BIEN', 'success', 'Pago por servicio Actualizado Correctamente.');

        $this->emit('close-modal-pago-servicio', 'Edicion de Atractivos');
        $this->resetUI();
        //$this->reset(['descripcion', 'precio', 'edicion','title','idBoletosPagosServicios']);
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-pago-servicio', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirmPagoServicios', [
            'title' => 'Estás seguro que deseas eliminar el Pago por Servicio ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function quitarPagos(BoletosPagarPaquetes $pagosPorServicio)
    {
        $pagosPorServicio->delete();
        $this->emit('alert', 'MUY BIEN', 'success', 'Pago por servicio eliminado correctamente.');

    }
}
