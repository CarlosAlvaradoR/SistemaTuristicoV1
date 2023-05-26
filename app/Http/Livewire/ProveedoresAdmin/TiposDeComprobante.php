<?php

namespace App\Http\Livewire\ProveedoresAdmin;

use App\Models\Pedidos\TipoComprobantes;
use App\Models\Reservas\SerieComprobantes;
use App\Models\Reservas\SeriePagos;
use Livewire\WithPagination;
use Livewire\Component;

class TiposDeComprobante extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $title = 'AÑADIR SERIES AL TIPO DE COMPROBANTE';
    public $idTipoComprobante, $nombre_tipo;
    public $idSeleccionado, $textoAMostrar = '';

    /**ATRIBUTOS DE SERIE DE COMPROBANTES
     */
    public $numero_serie, $estado;

    public function resetUI()
    {
        $this->reset(['idSeleccionado', 'textoAMostrar']);
        $this->reset(['numero_serie', 'estado']);
    }
    public function render()
    {
        $tipo_comprobantes = TipoComprobantes::where('nombre_tipo', 'like', '%' . $this->search . '%')
            ->paginate(10);

        $series = [];
        if ($this->idSeleccionado) {
            $tipo_comprobante = TipoComprobantes::where('id', $this->idSeleccionado)->first();
            $this->textoAMostrar = ' de ' . $tipo_comprobante->nombre_tipo;
            $series = SerieComprobantes::where('tipo_comprobantes_id', $this->idSeleccionado)
                ->get();
        }


        return view('livewire.proveedores-admin.tipos-de-comprobante', compact('tipo_comprobantes', 'series'));
    }

    public function select(TipoComprobantes $tipo_comprobantes)
    {
        // dd($tipo_comprobantes);
        $this->idSeleccionado = $tipo_comprobantes->id;
    }
    public function saveComprobante()
    {
        $this->validate(
            [
                'numero_serie' => 'required|string|min:1',
                'estado' => 'required|string',
            ]
        );

        if ($this->estado == 'ACTIVO') {
            $serie_comprobantes = SerieComprobantes::where('tipo_comprobantes_id', $this->idSeleccionado)
                ->get();
            foreach ($serie_comprobantes as $key => $s) {
                $serie = SerieComprobantes::find($s->id);
                $serie->estado = 'INACTIVO';
                $serie->save();
            }
        }

        $series = SerieComprobantes::create(
            [
                'numero_serie' => $this->numero_serie,
                'estado' => $this->estado,
                'tipo_comprobantes_id' => $this->idSeleccionado

            ]
        );

        $this->resetUI();
        $this->emit('alert', 'MUY BIEN', 'success', 'Serie Registrada Correctamente.');
    }
    public function Edit($id)
    {
    }
    public function saveTipoComprobante()
    {
    }

    /**
     * 
     */
}
