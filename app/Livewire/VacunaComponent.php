<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacuna;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class VacunaComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre = '',
            $id_seleccionado = 0;
    public function render()
    {
        $vacunas = Vacuna::paginate(10);
        return view('livewire.vacuna-component', ['vacunas' => $vacunas]);
    }

    public function default()
    {
        $this->nombre = '';
        $this->id_seleccionado = 0;
    }

    public function Crear()
    {
        $rules=[
            'nombre' => 'required|unique:vacunas',
        ];
        $messages=[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.unique' => 'El elemento ya existe.',
        ];
        $this->validate($rules, $messages);
        Vacuna::create([
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
