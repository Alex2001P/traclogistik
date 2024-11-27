<?php

namespace App\Livewire\Camiones;


use Livewire\Component;
use App\Models\StatusCamionesModel;

class TableStatusCamiones extends Component
{
    public $statusCamiones = [];
    public $statusCamionId = null;
    public $name;
    public $description;
    public $formModal = false;

    public function render()
    {
        $this->statusCamiones = StatusCamionesModel::all();
        return view('livewire.camiones.table-status-camiones');
    }

    public function edit($id){

        $statusCamion = StatusCamionesModel::find($id);
        $this->statusCamionId = $id;

        if(is_null($statusCamion)){
            session()->flash('status', 'Camion no existe!');
        }

        $this->name = $statusCamion->name;
        $this->description = $statusCamion->description;

        $this->onOpenModal();
    }

    public function update(){
        $statusCamion = StatusCamionesModel::find($this->statusCamionId);

        if ($statusCamion) {
            $statusCamion->name = $this->name;
            $statusCamion->description = $this->description;
            $statusCamion->save();

            session()->flash('message', 'Registro actualizado correctamente.');
        } else {
            session()->flash('error', 'Registro no encontrado.');
        }
        $this->onCloseModal();
        $this->resetValues();
    }

    public function delete($id){
        $statusCamion = StatusCamionesModel::find($id);

        if($statusCamion){
            $statusCamion->delete();
            session()->flash('status', 'Camion removido satisfactoriamente!');
        } else {
            session()->flash('status', 'Registro no encontrado');
        }

    }

    public function onOpenModal(){
        $this->formModal = true;
    }

    public function onCloseModal(){
        $this->formModal = false;
    }

    public function resetValues(){
        $this->name = '';
        $this->description = '';
    }
}
