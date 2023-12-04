<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Especie;
use App\Models\Raza;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ClienteComponent extends Component
{
    use LivewireAlert;

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

    protected $listeners = [
        'destroy_confirmed'
    ];
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
        $rules=[
            'nombre' => 'required|max:50',
            'correo' => 'required|max:64',
            'dni' => 'max:8',
            'telefono1' => 'max:9',
            'telefono2' => 'max:9',
        ];
        $messages=[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre debe ser de maximo 50 caracteres.',
            'correo.required' => 'El correo es requerido.',
            'dni.max' => 'El dni debe ser de maximo de 8 caracteres.',
            'telefono1.max' => 'El telefono debe ser de maximo 9 caracteres.',
            'telefono2.max' => 'El telefono debe ser de maximo 9 caracteres.',
        ];

        $this->validate($rules, $messages);

        Cliente::create([
            'nombre_completo' => $this->nombre,
            'correo' => $this->correo,
            'dni' => $this->dni,
            'telefono_1' => $this->telefono1,
            'telefono_2' => $this->telefono2
        ]);

        $this->alert('success', 'Se registro correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
        $this->default();
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
        $rules=[
            'nombre' => 'required|max:50',
            'correo' => 'required|max:64',
            'dni' => 'max:8',
            'telefono1' => 'max:9',
            'telefono2' => 'max:9',
        ];
        $messages=[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre debe ser de maximo 50 caracteres.',
            'correo.required' => 'El correo es requerido.',
            'dni.max' => 'El dni debe ser de maximo de 8 caracteres.',
            'telefono1.max' => 'El telefono debe ser de maximo 9 caracteres.',
            'telefono2.max' => 'El telefono debe ser de maximo 9 caracteres.',
        ];

        $this->validate($rules, $messages);

        $cliente = Cliente::find($this->id_seleccionado);

        $cliente->update([
            'nombre_completo' => $this->nombre,
            'correo' => $this->correo,
            'dni' => $this->dni,
            'telefono_1' => $this->telefono1,
            'telefono_2' => $this->telefono2
        ]);

        $this->alert('success', 'Se actualizo correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
    }

    public function Destroy($id)
    {
        $this->id_seleccionado = $id;
        $this->alert('question', '¿Está seguro?', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroy_confirmed',
            'showDenyButton' => true,
            'denyButtonText' => 'Cancelar',
            'confirmButtonText' => 'Si',
        ]);    
    }

    public function destroy_confirmed()
    {
        dd('llegue');
        $cliente = Cliente::find($this->id_seleccionado);
        $cliente->activo = false;
        $cliente->save();
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
        $rules=[
            'mas_nom' => 'required|max:20',
            'mas_obs' => 'max:64',
        ];
        $messages=[
            'mas_nom.required' => 'El nombre es requerido.',
            'mas_nom.max' => 'El nombre debe ser de maximo 20 caracteres.',
            'mas_obs.max' => 'La observacion debe ser de maximo 256 caracteres.',
        ];

        $this->validate($rules, $messages);

        Mascota::create([
            'nombre' => $this->mas_nom,
            'edad' => $this->mas_edad,
            'observaciones' => $this->mas_obs,
            'sexo' => $this->mas_s,
            'cliente_id' => $this->id_seleccionado,
            'raza_id' => $this->mas_raz,
        ]);

        $this->alert('success', 'Se registro correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);

        $this->AddMasc();
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
        $rules=[
            'mas_nom' => 'required|max:20',
            'mas_obs' => 'max:64',
        ];
        $messages=[
            'mas_nom.required' => 'El nombre es requerido.',
            'mas_nom.max' => 'El nombre debe ser de maximo 20 caracteres.',
            'mas_obs.max' => 'La observacion debe ser de maximo 256 caracteres.',
        ];

        $this->validate($rules, $messages);

        $mascota = Mascota::find($this->mas_id_sel);
        $mascota->update([
            'nombre' => $this->mas_nom,
            'edad' => $this->mas_edad,
            'observaciones' => $this->mas_obs,
            'sexo' => $this->mas_s,
            'cliente_id' => $this->id_seleccionado,
            'raza_id' => $this->mas_raz,
        ]);

        $this->alert('success', 'Se actualizo correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
    }
}
