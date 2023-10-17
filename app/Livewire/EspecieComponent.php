<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Especie;

class EspecieComponent extends Component
{
    public $nombre='',
        $id_seleccionado = 0;
    public function render()
    {
        $especies = Especie::all();
        return view('livewire.especie-component', ['especies' => $especies]);
    }

    public function default()
    {
        $this->nombre='';
        $this->id_seleccionado = 0;
    }

    public function Crear()
    {
        Especie::create([
            'nombre_especie' => $this->nombre,
        ]);
        $this->reset();
        return redirect()->to('especie');
    }

    public function Editar($id)
    {
        $record = Especie::find($id);
        $this->nombre = $record->nombre_especie;

        $this->id_seleccionado = $record->id;
    }

    public function Update()
    {
        $cliente = Especie::find($this->id_seleccionado);
        $cliente->update([
            'nombre_especie' => $this->nombre,
        ]);

        $this->default();
        $this->reset();
        return redirect()->to('especies');
    }
}
