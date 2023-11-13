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
            $mas_id_sel=0,
            $razas=[],
            $especies=[];

    private $tmp = 0;
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
                ->select('r.nombre_raza', 'e.nombre_especie', 'mascotas.id', 'nombre', 'edad', 'sexo', 'observaciones', 'cliente_id', 'activo')
                ->get();
            $this->especies = Especie::all();
            $this->razas = Raza::where('especie_id', $this->mas_esp)->get();
        }

        return view('livewire.cliente-component', ['clientes' => $clientes, 'mascotas' => $mascotas, 'especies' => $this->especies, 'razas' => $this->razas]);
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

    public function EditMasc($id)
    {
        $this->AddMasc();
        $mascotas = Mascota::join('razas as r', 'raza_id', '=', 'r.id')
                ->join('especies as e', 'r.especie_id', '=', 'e.id')
                ->where('mascotas.id', $id)
                ->where('activo', true)
                ->select('mascotas.raza_id', 'r.nombre_raza', 'e.nombre_especie', 'mascotas.id', 'nombre', 'edad', 'sexo', 'observaciones', 'cliente_id', 'activo')
                ->get();


        $this->mas_id_sel = $id;
        $mascotas = $mascotas[0];
        $this->mas_nom = $mascotas->nombre;
        $this->mas_edad = $mascotas->edad;
        $this->mas_s = $mascotas->sexo;
        $this->mas_obs = $mascotas->observaciones;
        $this->mas_raz = $mascotas->raza_id;
        $this->especies = Especie::all();
        $this->mas_esp = Raza::where('id', $this->mas_raz)->get();
        $this->mas_esp = $this->mas_esp[0]->especie_id;
        $this->razas = Raza::where('especie_id', $this->mas_esp)->get();
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
        $clave = env('APP_KEY');
        $iv = openssl_random_pseudo_bytes(16);
        $iv = str_replace('/', '-', base64_encode($iv));
        $en =openssl_encrypt($id, 'aes-256-cbc', $clave, 0, base64_decode(str_replace('-', '/', $iv))); 
        $en = str_replace('/', '-', $en);
        $r = $iv . ':' . $en;
        redirect()->to('/historia-clinica/' . $r);
    }

    public function UpdateMasc()
    {
        $mascota = Mascota::find($this->mas_id_sel);
        $mascota->update([
            'nombre' => $this->mas_nom,
            'edad' => $this->mas_edad,
            'observaciones' => $this->mas_obs,
            'sexo' => $this->mas_s,
            'cliente_id' => $this->id_seleccionado,
            'raza_id' => $this->mas_raz,
        ]);      
    }
}
