<?php

namespace App\Livewire\Camiones;

use App\Models\StatusCamionesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\CamionesModel;

class FormCamiones extends Component
{

    //props componentes
    public $action;

    //variables
    public $placa;
    public $chasis;
    public $status_id;
    public $selectedOption = null;
    public $options = [];
    public $isOpenModal = false;

    public function mount()
    {
        $this->options = StatusCamionesModel::all()->pluck('name', 'status_id')->toArray();
    }
    public function render()
    {
        return view('livewire.camiones.form-camiones');
    }

    public function save(){

        $usuario = Auth::user();

        CamionesModel::create([
            'placa' => $this->placa,
            'chasis' => $this->chasis,
            'status_id' => $this->selectedOption,
            'transportista_id' => $usuario->transportista_id
        ]);

        return redirect()->to('/camiones')
            ->with('status', 'Camion Creado!');
    }

    public function openModal(){
        $this->isOpenModal = true;
    }

}
