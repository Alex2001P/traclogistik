<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StatusPiloto;
class StatusPilotosController extends Component
{

    public function render()
    {
        $this->statusPilotos = StatusPiloto::all();
        return view('livewire.status-pilotos');
    }
}
