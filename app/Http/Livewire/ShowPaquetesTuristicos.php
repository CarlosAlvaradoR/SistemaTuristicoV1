<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaquetesTuristicos;

class ShowPaquetesTuristicos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        //$paquetes = PaquetesTuristicos::paginate(12);
        $paquetes=PaquetesTuristicos::where('nombre', 'like', '%'.$this->search.'%')
        ->paginate(12);
        return view('livewire.show-paquetes-turisticos', compact('paquetes'));
    }
}
