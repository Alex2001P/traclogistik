<?php

namespace App\Livewire\Historial;

use App\Models\PedidosModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableHistorial extends Component
{
    public $asignacionSelected = null;
    public function render()
    {
        $asignaciones = DB::table("asignaciones as a")
            ->join('contenedores as c', 'c.id', '=', 'a.contenedor_id')
            ->join('size_contenedores as sc', 'c.size', '=', 'sc.size_contenedor_id')
            ->join('transportistas as t', 't.id', '=', 'a.transportista_id')
            ->join('camiones', 'camiones.camion_id', '=', 'a.transportista_id' )
            ->join('cortes as tu', 'tu.id', '=', 'a.corte_id')
            ->where('a.status', '=', true)
            ->select('tu.finca','tu.turno','a.asignacion_id as id','a.corte_id','t.name as transportista','a.ubicacion', 'camiones.placa', 'a.km', 'c.identificador', 'c.id as contenedor_id', 'sc.name', 'sc.size_contenedor_id')
            ->get();

        $pedidos = PedidosModel::all();
        return view('livewire.historial.table-historial', ['asignaciones' => $asignaciones, 'pedidos' => $pedidos]);
    }

    public function navegarDetallePedido($asignacionId)
    {
        return redirect()->route('detalle.pedido', ['id' => $asignacionId]);
    }
}
