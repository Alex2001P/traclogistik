<?php

namespace App\Livewire;

use App\Models\ContenedoresModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransportistaScreen extends Component
{

    public function render()
    {
        $contenedores = DB::table('contenedores')
            ->join('size_contenedores as sc', 'contenedores.size', '=', 'sc.size_contenedor_id')
            ->select('contenedores.*', 'sc.size_contenedor_id')
            ->get();

        return view('livewire.transportista-screen', [ 'contenedores' => $contenedores]);
    }
}
