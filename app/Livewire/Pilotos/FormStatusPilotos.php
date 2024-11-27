<?php

namespace App\Livewire\Pilotos;

use App\Models\StatusPiloto;
use Illuminate\Http\Request;
use Livewire\Component;

class FormStatusPilotos extends Component
{

    public $name;
    public $description;

    public function render()
    {
        return view('livewire.pilotos.form-status-pilotos');
    }

    public function save(Request $request)
    {
        StatusPiloto::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        return redirect()->to('/status_pilotos')
            ->with('status', 'Status Creado!');
    }
}
