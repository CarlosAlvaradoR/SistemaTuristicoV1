<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\PoliticasCondicioReservas;

use App\Models\Reservas\PoliticaDeCumplimientos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PoliticasCondicioReservas extends Component
{
    public $search, $title = '', $idEvento;
    public $politicas = [], $cantidad_de_dias;

    public function rules()
    {
        return [
            'politicas.*.cantidad_de_dias' => 'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'politicas.*.cantidad_de_dias.required' => 'La cantidad de días es obligatoria.',
            'politicas.*.cantidad_de_dias.integer' => 'La cantidad de días debe ser un número entero.',
            'politicas.*.cantidad_de_dias.min' => 'La cantidad de días debe de ser al menos 1.',
        ];
    }

    public function render()
    {
        $politicas = PoliticaDeCumplimientos::where('id', 1)->get();
        $this->politicas = $politicas->toArray();
        // dd($this->politicas[0]['id']);
        return view('livewire.reservas-admin.reservas.politicas-condicio-reservas.politicas-condicio-reservas');
    }

    public function guardar()
    {
        // dd($this->politicas);
        $this->validate();
        foreach ($this->politicas as $politica) {
            DB::table('politica_de_cumplimientos')
                ->where('id', 1)
                ->update(['cantidad_de_dias' => $politica['cantidad_de_dias']]);
        }

        // Limpiar los valores de los input después de guardar
        // $this->reset('notas');
        $this->emit('alert', 'MUY BIEN', 'success', 'Información Actualizada Correctamente.');
    }
}
