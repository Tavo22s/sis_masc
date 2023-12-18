<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Plan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class PlanComponent extends Component
{
    use LivewireAlert;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $id_seleccionado=0,
        $nombre = '';
    public function render()
    {
        $planes = Plan::paginate(10);
        return view('livewire.plan-component', ['planes' => $planes]);
    }

    public function Crear()
    {
        $rules=[
            'nombre' => 'required|unique:plans|max:254',
        ];
        $messages=[
            'nombre.required' => 'El nombre es requerido',
            'nombre.unique' => 'El elemento ya existe',
            'nombre.max' => 'Debe ser de maximo 254 caracteres.'
        ];

        $this->validate($rules, $messages);

        Plan::create([
            'nombre' => $this->nombre,
        ]);

        $this->alert('success', 'Se creo el plan', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
        $this->reset('nombre');
    }

    public function default()
    {
        $this->reset('nombre');
        $this->reset('id_seleccionado');
    }
}
