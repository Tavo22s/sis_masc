<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Models\PlanDiagnostico;
use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PlanDiagnosticoComponent extends Component
{
    use LivewireAlert;
    public $id_consulta = 0,
        $id_seleccionado = 0,
        $id_plan_diagnostico = 0,
        $resultados = '';

    #[On('show-plan-diagnostico')] 
    public function SendIDData($id)
    {
        $this->id_consulta = ($this->id_consulta == $id)? 0 : $id;
    }
    public function render()
    {
        $planes_diag = PlanDiagnostico::select('plans.*', 'plan_diagnosticos.*')
            ->join('plans', 'plan_diagnosticos.plan_id', '=', 'plans.id')
            ->where('plan_diagnosticos.consulta_id', $this->id_consulta)
            ->get();

        $planes = Plan::all();
        if($this->id_plan_diagnostico == 0 && !$planes->isEmpty())
        {
            $this->id_plan_diagnostico = $planes[0]->id;
        }

        if($this->id_consulta == 0)
            return '<div></div>';
        return view('livewire.plan-diagnostico-component', [
            'planes_diag' => $planes_diag,
            'planes' => $planes,
        ]);
    }

    public function default()
    {
        $this->reset('id_plan_diagnostico');
        $this->reset('resultados');
        $this->reset('id_seleccionado');
    }

    public function Crear()
    {
        $rules=[
            'resultados' => 'max:50',
        ];
        $messages=[
            'resultados.max' => 'El resultado debe ser de maximo 50 caracteres.',
        ];

        $this->validate($rules, $messages);

        PlanDiagnostico::create([
            'plan_id' => $this->id_plan_diagnostico,
            'consulta_id' => $this->id_consulta,
            'resultados' => $this->resultados,
        ]);
        $this->alert('success', 'Se registro correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);

        $this->default();
    }

    public function Editar(PlanDiagnostico $planDiagnostico)
    {
        $this->id_seleccionado = $planDiagnostico->id;
        $this->id_plan_diagnostico = $planDiagnostico->plan_id;
        $this->resultados = $planDiagnostico->resultados;
    }

    public function Destroy(PlanDiagnostico $planDiagnostico)
    {
        $planDiagnostico->delete();
    }

    public function Update()
    {
        $rules=[
            'resultados' => 'max:50',
        ];
        $messages=[
            'resultados.max' => 'El resultado debe ser de maximo 50 caracteres.',
        ];

        $this->validate($rules, $messages);
        $plandig = PlanDiagnostico::find($this->id_seleccionado);
        $plandig->update([
            'plan_id' => $this->id_plan_diagnostico,
            'resultados' => $this->resultados,
        ]);
        $this->alert('success', 'Se actualizo correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
    }
}
