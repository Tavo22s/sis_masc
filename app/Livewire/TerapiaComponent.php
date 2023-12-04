<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Terapia;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class TerapiaComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $nombre = '',
        $id_seleccionado = 0;
    public function render()
    {
        $terapias = Terapia::paginate(10);
        return view('livewire.terapia-component', ['terapias' => $terapias]);
    }

    public function default()
    {
        $this->nombre = '';
        $this->id_seleccionado = 0;
    }

    public function Crear()
    {
        $rules=[
            'nombre' => 'required|unique:terapias',
        ];
        $messages=[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.unique' => 'El elemento ya existe.',
        ];
        $this->validate($rules, $messages);
        Terapia::create([
            'nombre' => $this->nombre,
        ]);
        $this->alert('success', 'Se registro correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
        $this->default();
    }

    public function Update()
    {

    }
}
