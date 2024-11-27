<?php

namespace App\Livewire\Pilotos;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\PilotosModel;
use App\Models\StatusPiloto;
class FormPilotos extends Component
{
    public $name;
    public $lastname;
    public $telefono;
    public $confirmCreatePiloto = false;
    public $selectedOption = null;
    public $options = [];

    public function mount()
    {
        $this->options = StatusPiloto::all()->pluck('name', 'status_id')->toArray();
    }

    public function onOpenModal() {
        $this->confirmCreatePiloto = true;
    }


    public function render()
    {
        return view('livewire.pilotos.form-pilotos');
    }

    public function save()
    {
        $usuario = Auth::user();
        PilotosModel::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'telefono' => $this->telefono,
            'status_id' => $this->selectedOption,
            'transportista_id' => $usuario->transportista_id
        ]);

        return redirect()->to('/pilotos')
            ->with('status', 'Piloto Creado!');
    }
}
