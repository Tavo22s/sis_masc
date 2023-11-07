<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Crypt;

class ConsultaComponent extends Component
{
    public function show($id)
    {
        return view('consulta', ['id' => $id]);
    }
}