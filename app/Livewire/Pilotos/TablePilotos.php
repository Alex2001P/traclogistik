<?php

namespace App\Livewire\Pilotos;

use App\Models\StatusPiloto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\PilotosModel;
use Illuminate\Support\Facades\DB;

class TablePilotos extends Component
{

    public $name;
    public $lastname;
    public $telefono;
    public $status_id;
    public $confirmPilotoModal = false;
    public $pilotos = [];
    public $lastStatus;
    public $pilotoId = null;
    public $optionsStatus = [];
    public $selectedOption = null;
    public function render()
    {
        $usuario = Auth::user();
        $this->pilotos = DB::table('pilotos')
            ->join('status_pilotos' , 'pilotos.status_id', '=', 'status_pilotos.status_id')
            ->where('transportista_id' , '=', $usuario->transportista_id)
            ->where('soft_delete' , '=', false)
            ->select('pilotos.piloto_id','pilotos.name', 'pilotos.lastname', 'pilotos.telefono', 'status_pilotos.name as status_name', 'status_pilotos.status_id')
            ->get();
        return view('livewire.pilotos.table-pilotos');
    }


    public function edit($id)
    {
        $this->onOpenModal();
        $this->optionsStatus = StatusPiloto::all()->pluck('name', 'status_id')->toArray();
        $usuario = Auth::user();
        $piloto = DB::table('pilotos')
            ->join('status_pilotos' , 'pilotos.status_id', '=', 'status_pilotos.status_id')
            ->select('pilotos.piloto_id','pilotos.name', 'pilotos.lastname', 'pilotos.telefono', 'status_pilotos.name as status_name', 'status_pilotos.status_id')
            ->where('pilotos.piloto_id', '=', $id)
            ->where('pilotos.transportista_id', $usuario->transportista_id)
            ->first();

        $this->pilotoId = $id;

        if ($piloto) {
            $this->name = $piloto->name;
            $this->lastname = $piloto->lastname;
            $this->telefono = $piloto->telefono;
            $this->lastStatus = $piloto->status_name;
        } else {
            session()->flash('error', 'Registro no encontrado.');
        }

    }

    public function update()
    {

        $piloto = PilotosModel::find($this->pilotoId);

        if ($piloto) {
            $piloto->name = $this->name;
            $piloto->lastname = $this->lastname;
            $piloto->telefono = $this->telefono;
            $piloto->status_id = $this->selectedOption;
            $piloto->save();

            session()->flash('message', 'Registro actualizado correctamente.');
        } else {
            session()->flash('error', 'Registro no encontrado.');
        }

       $this->onCloseModal();
    }

    public function delete($id)
    {
        $piloto = PilotosModel::find($id);

        if($piloto){
            $piloto->soft_delete = true;
            $piloto->save();
        }
    }

    public function onOpenModal(){
        $this->confirmPilotoModal = true;
    }
    public function onCloseModal(){
        $this->confirmPilotoModal = false;
    }

}
