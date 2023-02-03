<?php

namespace App\Http\Livewire\ViajesAdmin\Viajes\VerTodo;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class VerTodo extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public $search = '';

    public function render()
    {
        $viajes = DB::table('v_viajes_all')
        ->where('nombre', 'like', '%'.$this->search.'%')
        ->orWhere('descripcion', 'like', '%'.$this->search.'%')
        ->paginate(20);
        return view('livewire.viajes-admin.viajes.ver-todo.ver-todo', compact('viajes'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
