<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Especie;
use App\Models\Raza;

class EspecieComponent extends Component
{
    public $nombre='',
        $id_seleccionado = 0,
        $add_r = false,
        $r_name = '';
    public function render()
    {
        $especies = Especie::all();
        $razas = [];
        if($this->id_seleccionado > 0)
        {
            $razas = Raza::where('especie_id', $this->id_seleccionado);
        }
        return view('livewire.especie-component', ['especies' => $especies, 'razas' => $razas]);
    }

    public function default()
    {
        $this->nombre='';
        $this->id_seleccionado = 0;
        $this->nombre_raza='';
    }

    public function Crear()
    {
        Especie::create([
            'nombre_especie' => $this->nombre,
        ]);
        $this->reset();
        return redirect()->to('especies');
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

    public function OpenAdd()
    {
        $this->add_r = true;
    }

    public function CloseAdd()
    {
        $this->add_r = false;
    }

    public function def_r()
    {
        $this->r_name = '';
        $this->CloseAdd();
    }

    public function save_r()
    {
        Raza::create([
            'especie_id' => $this->id_seleccionado,
            'nombre_raza' => $this->r_name
        ]);
        $this->def_r();
    }
}
