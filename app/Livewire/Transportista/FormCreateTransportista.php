<?php

namespace App\Livewire\Transportista;

use App\Models\PilotosModel;
use App\Models\TransportistasModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCreateTransportista extends Component
{
    public $name;
    public $confirmCreateTransportista = false;
    public function render()
    {
        return view('livewire.transportista.form-create-transportista');
    }

    public function save()
    {
        TransportistasModel::create([
            'name' => $this->name,
        ]);

        return redirect()->to('/createTransportista')
            ->with('status', 'Piloto Creado!');
    }

    public function onOpenModal() {
        $this->confirmCreateTransportista = true;
    }

}
