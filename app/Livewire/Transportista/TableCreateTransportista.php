<?php

namespace App\Livewire\Transportista;

use App\Models\TransportistasModel;
use Livewire\Component;

class TableCreateTransportista extends Component
{
    public function render()
    {
        $transportistas = TransportistasModel::all();
        return view('livewire.transportista.table-create-transportista', ['transportistas' => $transportistas]);
    }
}
