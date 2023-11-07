<?php

namespace App\Livewire;

use Laravel\Sail\Console\AddCommand;
use Livewire\Component;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Especie;
use App\Models\Raza;
use Illuminate\Support\Facades\Crypt;

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

    public $mas_nom='',
            $mas_edad='',
            $mas_esp=0,
            $mas_raz=0,
            $mas_s='',
            $mas_obs='',
            $mas_id_sel=0;
    public function render()
    {
        $mascotas=[];
        $razas=[];
        $especies=[]; 
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
                ->select('r.nombre_raza', 'e.nombre_especie', 'mascotas.id', 'nombre', 'edad', 'sexo', 'observaciones', 'cliente_id', 'activo')
                ->get();
            $especies = Especie::all();
            $razas = Raza::where('especie_id', $this->mas_esp)->get();
        }

        return view('livewire.cliente-component', ['clientes' => $clientes, 'mascotas' => $mascotas, 'especies' => $especies, 'razas' => $razas]);
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

    public function AddMasc()
    {
        $especie = Especie::first();
        $this->mas_esp = $especie->id;
        $masc = Raza::where('especie_id', $this->mas_esp)->get();
        $this->mas_raz = $masc[0]->id;
        $this->mas_s = "Macho";
        $this->mas_nom = '';
        $this->mas_edad = '';
        $this->mas_obs = '';
    }

    public function CreateMasc()
    {
        Mascota::create([
            'nombre' => $this->mas_nom,
            'edad' => $this->mas_edad,
            'observaciones' => $this->mas_obs,
            'sexo' => $this->mas_s,
            'cliente_id' => $this->id_seleccionado,
            'raza_id' => $this->mas_raz,
        ]);
    }

    public function Rdata($id)
    {
        redirect()->to('/historia-clinica-' . $id);
    }
}
