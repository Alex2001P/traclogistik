<?php

namespace App\Livewire\Pilotos;

use Livewire\Component;
use App\Models\StatusPiloto;

class TableStatusPilotos extends Component
{
    public $statusPilotos = [];
    public $statusPilotoId;
    public $name;
    public $description;
    public $confirmingLogout = false;

    public function render()
    {
        $this->statusPilotos = StatusPiloto::all();
        return view('livewire.pilotos.table-status-pilotos');
    }

    public function delete($id)
    {
        $statusPiloto = StatusPiloto::find($id);

        if($statusPiloto) {
            $statusPiloto->delete();

            session()->flash('status', 'Piloto removido satisfactoriamente!');
        } else {
            session()->flash('status', 'Registro no encontrado');
        }

    }

    public function edit($id)
    {
        $this->confirmingLogout = true;
        $statusPiloto = StatusPiloto::find($id);
        $this->statusPilotoId = $id;

        if ($statusPiloto) {
            $this->name = $statusPiloto->name;
            $this->description = $statusPiloto->description;
        } else {
            session()->flash('error', 'Registro no encontrado.');
        }

    }

    public function update()
    {

        $statusPiloto = StatusPiloto::find($this->statusPilotoId);

        if ($statusPiloto) {
            $statusPiloto->name = $this->name;
            $statusPiloto->description = $this->description;
            $statusPiloto->save();

            session()->flash('message', 'Registro actualizado correctamente.');
        } else {
            session()->flash('error', 'Registro no encontrado.');
        }

        // Resetear los campos del formulario
        $this->resetInputFields();
        $this->confirmingLogout = false;
    }

    // Resetear los campos del formulario
    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }

}
