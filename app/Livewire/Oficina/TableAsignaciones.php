<?php

namespace App\Livewire\Oficina;

use App\Models\AsignacionesModel;
use App\Models\PedidosModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class TableAsignaciones extends Component
{
    public $asignacionSelected = null;

    public function render()
    {
        $asignaciones = DB::table("asignaciones as a")
            ->leftJoin('contenedores as c', 'c.id', '=', 'a.contenedor_id')
            ->leftJoin('size_contenedores as sc', 'c.size', '=', 'sc.size_contenedor_id')
            ->join('transportistas as t', 't.id', '=', 'a.transportista_id')
            ->join('camiones', 'camiones.camion_id', '=', 'a.camion_id' )
            ->where('a.status', '=', false)
            ->select('a.asignacion_id as id','a.corte_id','t.name as transportista','a.ubicacion', 'camiones.placa', 'a.km', 'c.identificador', 'c.id as contenedor_id', 'sc.name', 'sc.size_contenedor_id')
            ->get();

        $pedidos = DB::table("cortes as p")
            ->where('p.is_asigned', '=', false)
            ->select('p.*')
            ->get();

        return view('livewire.oficina.table-asignaciones', ['asignaciones' => $asignaciones, 'pedidos' => $pedidos]);
    }

    public function asignarPedido($asignacionId)
    {
        if($this->asignacionSelected == null){
            $this->js("alert('Selecciona un pedido a asignar')");
        }

        $asignacion = AsignacionesModel::find($asignacionId);
        $orden = PedidosModel::find($this->asignacionSelected);

        if($asignacion){
            $asignacion->corte_id = $this->asignacionSelected;
            $asignacion->save();

            $orden->is_asigned = true;
            $orden->save();
        }
        $this->asignacionSelected = null;
        $this->js("alert('Asignacion completada')");
    }

    public function navegarDetallePedido($asignacionId)
    {
        return redirect()->route('detalle.pedido', ['id' => $asignacionId]);
    }

    public function finalizarPedido($asignacionId)
    {
        $asignacion = AsignacionesModel::find($asignacionId);

        if(!$asignacion){
            $this->js("alert('Ah ocurrido un error')");
            return;
        }

        $asignacion->status = true;
        $asignacion->save();
    }

}
