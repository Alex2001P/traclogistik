<?php

namespace App\Livewire\Camiones;

use App\Models\CamionesModel;
use App\Models\StatusCamionesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableCamiones extends Component
{
    public $camiones = [];
    public $options = [];
    public $placa;
    public $chasis;
    public $status_id;
    public $nameStatus;
    public $camionId;
    public $selectedOption = null;
    public $formModal = false;


    public function render()
    {
        $usuario = Auth::user();
        $this->camiones = DB::table('camiones')
            ->join('status_camiones', 'status_camiones.status_id', '=', 'camiones.status_id')
            ->select('camiones.camion_id','camiones.placa', 'camiones.chasis', 'status_camiones.name as status_name', 'status_camiones.status_id')
            ->where('camiones.transportista_id', '=', $usuario->transportista_id)
            ->where('soft_delete', '=', false)
            ->orderBy('status_name', 'desc')
            ->get();
        $this->options = StatusCamionesModel::all()->pluck('name', 'status_id')->toArray();
        return view('livewire.camiones.table-camiones');
    }

    public function edit($id){
        $camion = DB::table('camiones')
            ->join('status_camiones', 'camiones.status_id', '=', 'status_camiones.status_id')
            ->select('camiones.camion_id','camiones.placa', 'camiones.chasis', 'status_camiones.name as status_name', 'status_camiones.status_id')
            ->where('camiones.camion_id', $id)
            ->first();
        $this->camionId = $camion->camion_id;

        if($camion){
            $this->placa = $camion->placa;
            $this->chasis = $camion->chasis;
            $this->nameStatus = $camion->status_name;
        }

        $this->formModal = true;
    }

    public function update(){

        $camion = CamionesModel::find($this->camionId);

        if($camion){
            $camion->placa = $this->placa;
            $camion->chasis = $this->chasis;
            $camion->status_id = $this->selectedOption;
            $camion->save();
            session()->flash('message', 'Registro actualizado correctamente.');
        } else {
            session()->flash('error', 'Registro no encontrado.');
        }
        $this->formModal = false;
    }

    public function delete($id){
        $camion = CamionesModel::find($id);

        if($camion){
            $camion->soft_delete = true;
            $camion->save();
        }
    }
}
