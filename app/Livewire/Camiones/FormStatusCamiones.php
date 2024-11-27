<?php

namespace App\Livewire\Camiones;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\StatusCamionesModel;

class FormStatusCamiones extends Component
{

    public $name;
    public $description;

    public function render()
    {

        return view('livewire.camiones.form-status-camiones');
    }

    public function save(Request $request)
    {
        StatusCamionesModel::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        return redirect()->to('/status_camiones')
            ->with('status', 'Status Creado!');
    }
}
