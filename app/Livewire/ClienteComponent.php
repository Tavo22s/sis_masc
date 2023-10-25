<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Mascota;

class ClienteComponent extends Component
{
    public $busqueda,
        $nombre='',
        $correo='',
        $dni='',
        $telefono1='',
        $telefono2='',
        $id_seleccionado=0,
        $m_busqueda;
    public function render()
    {
        $mascotas=[];
        $clientes = Cliente::where(function ($query) {
            $query->where('nombre_completo', 'like', '%' . $this->busqueda . '%')
                  ->orWhere('correo', 'like', '%' . $this->busqueda . '%')
                  ->orWhere('dni', 'like', '%' . $this->busqueda . '%')
                  ->orWhere('telefono_1', 'like', '%' . $this->busqueda . '%')
                  ->orWhere('telefono_2', 'like', '%' . $this->busqueda . '%');
        })->Where('activo', true)->get();
        if($this->id_seleccionado != 0)
        {
            $mascotas = Mascota::join('razas as r', 'raza_id', '=', 'r.id')
                ->join('especies as e', 'r.especie_id', '=', 'e.id')
                ->where('cliente_id', $this->id_seleccionado)
                ->where('nombre', 'like', '%' . $this->m_busqueda . '%')
                ->where('activo', true)
                ->select('r.nombre_raza', 'e.nombre_especie', 'nombre', 'edad', 'sexo', 'observaciones', 'cliente_id', 'activo')
                ->get();
        }

        return view('livewire.cliente-component', ['clientes' => $clientes, 'mascotas' => $mascotas]);
    }

    public function Crear()
    {
        Cliente::create([
            'nombre_completo' => $this->nombre,
            'correo' => $this->correo,
            'dni' => $this->dni,
            'telefono_1' => $this->telefono1,
            'telefono_2' => $this->telefono2
        ]);

        $this->reset();
        return redirect()->to('clientes');
    }

    public function Editar($id)
    {
        $record = Cliente::find($id);
        $this->nombre = $record->nombre_completo;
        $this->correo = $record->correo;
        $this->dni = $record->dni;
        $this->telefono1 = $record->telefono_1;
        $this->telefono2 = $record->telefono_2;

        $this->id_seleccionado = $record->id;
    }

    public function default()
    {
        $this->nombre = '';
        $this->correo = '';
        $this->dni = '';
        $this->telefono1 = '';
        $this->telefono2 = '';
        $this->id_seleccionado = 0;
    }

    public function Update()
    {
        $cliente = Cliente::find($this->id_seleccionado);
        $cliente->update([
            'nombre_completo' => $this->nombre,
            'correo' => $this->correo,
            'dni' => $this->dni,
            'telefono_1' => $this->telefono1,
            'telefono_2' => $this->telefono2
        ]);

        $this->default();
        $this->reset();
        return redirect()->to('clientes');
    }

    public function Destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->activo = false;
        $cliente->save();

        $this->reset();
        return redirect()->to('clientes');
    }
}
