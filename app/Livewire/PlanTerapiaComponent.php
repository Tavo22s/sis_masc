<?php

namespace App\Livewire;

use App\Models\PlanTerapia;
use App\Models\Terapia;
use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PlanTerapiaComponent extends Component
{
    use LivewireAlert;
    public $id_consulta = 0,
        $id_seleccionado = 0,
        $id_terapia = 0,
        $dosis = '',
        $recomendacion = '';

    #[On('show-plan-terapia')] 
    public function SendIDData($id)
    {
        $this->id_consulta = ($this->id_consulta == $id)? 0 : $id;
    }
    public function render()
    {
        $planes_terapia = PlanTerapia::select('terapias.*', 'plan_terapias.*')
            ->join('terapias', 'plan_terapias.terapia_id', '=', 'terapias.id')
            ->where('plan_terapias.consulta_id', $this->id_consulta)
            ->get();
        $terapias = Terapia::all();

        if($this->id_terapia == 0 && !$terapias->isEmpty())
        {
            $this->id_terapia = $terapias[0]->id;
        }

        if($this->id_consulta == 0)
            return '<div></div>';
        return view('livewire.plan-terapia-component',[
            'planes_terapia' => $planes_terapia,
            'terapias' => $terapias,
        ]);
    }

    public function default()
    {
        $this->reset('id_seleccionado');
        $this->reset('id_terapia');
        $this->reset('dosis');
        $this->reset('recomendacion');
    }

    public function Crear()
    {
        $rules=[
            'dosis' => 'max:20',
            'recomendacion' => 'max:254'
        ];
        $messages=[
            'dosis.max' => 'El resultado debe ser de maximo 20 caracteres.',
            'recomendacion.max' => 'Las recomendaciones debe ser de maximo 254 caracteres.',
        ];
        $this->validate($rules, $messages);

        PlanTerapia::create([
            'terapia_id' => $this->id_terapia,
            'consulta_id' => $this->id_consulta,
            'dosis' => $this->dosis,
            'recomendaciones' => $this->recomendacion,
        ]);
        $this->alert('success', 'Se registro correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);

        $this->default();
    }

    public function Editar(PlanTerapia $planTerapia)
    {
        $this->id_seleccionado = $planTerapia->id;
        $this->dosis = $planTerapia->dosis;
        $this->id_terapia = $planTerapia->terapia_id;
        $this->recomendacion = $planTerapia->recomendaciones;
    }
}
