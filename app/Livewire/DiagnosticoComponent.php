<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Diagnostico;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class DiagnosticoComponent extends Component
{
    use LivewireAlert;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $id_seleccionado=0,
        $nombre = '';
    public function render()
    {
        $diagnosticos = Diagnostico::paginate(5);
        return view('livewire.diagnostico-component', [
            'diagnosticos' => $diagnosticos
        ]);
    }

    public function default()
    {
        $this->nombre = '';
    }

    public function Crear()
    {
        $rules=[
            'nombre' => 'required',
        ];
        $messages=[
            'nombre.required' => 'El nombre es requerido',
        ];

        $this->validate($rules, $messages);

        Diagnostico::create([
            'nombre' => $this->nombre,
        ]);

        $this->alert('success', 'Se creo el diagnostico', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);

        $this->nombre = '';
    }
}
