<?php

namespace App\Livewire\Transportista;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableAsignaciones extends Component
{
    public $selectedOption = null;

    public function render()
    {
        $asignaciones = DB::table("asignaciones as a")
            ->leftJoin('contenedores as c', 'c.id', '=', 'a.contenedor_id')
            ->leftJoin('size_contenedores as sc', 'c.size', '=', 'sc.size_contenedor_id')
            ->join('camiones', 'camiones.camion_id', '=', 'a.camion_id')
            ->join('pilotos', 'pilotos.piloto_id', '=', 'a.piloto_id')
            ->select('a.asignacion_id as id', 'a.corte_id','a.ubicacion', 'camiones.placa', 'pilotos.name', 'a.km', 'c.identificador', 'c.id as contenedor_id', 'sc.name', 'sc.size_contenedor_id')
            ->get();

        $contenedores = DB::table('contenedores')
            ->join('size_contenedores as sc', 'contenedores.size', '=', 'sc.size_contenedor_id')
            ->select('contenedores.*', 'sc.size_contenedor_id')
            ->get();

        return view('livewire.transportista.table-asignaciones', [ 'contenedores' => $contenedores, 'asignaciones' => $asignaciones]);
    }

    public function navegarDetallePedido($asignacionId)
    {
        return redirect()->route('detalle.pedido', ['id' => $asignacionId]);
    }
}
