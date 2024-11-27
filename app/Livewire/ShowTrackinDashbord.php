<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\TrackingModel;
class ShowTrackinDashbord extends Component
{
    public $markers = [
        ['lat' => 15.7170, 'long' => -88.5954, 'info' => 'Puerto Barrios, Izabal, Guatemala', 'viajeId' => ''],
        ['lat' => 15.4721, 'long' => -88.8256, 'info' => 'Morales, Izabal, Guatemala'],
        ['lat' => 15.6386, 'long' => -88.6076, 'info' => 'Santo Tomás de Castilla, Izabal, Guatemala'],
    ];
    public $markers2 = [];

    public $selectedMarker = '';

    public $mapId = "mapas";
    public $maxZoomLevel = 15;
    public $attribution = 'comuniti';
    public $selectedOption = null;
    public $dataSelected;
    public $userSelected;
    public $moreInfo = null;


    protected $listeners = ['markerSelected' => 'handleMarkerSelected'];

    public function updatedSelectedOption($value)
    {
        // Lógica que deseas ejecutar cuando selectedOption cambie
    }

    public function navegarDetallePedido($asignacionId)
    {
        return redirect()->route('detalle.pedido', ['id' => $asignacionId]);
    }
    public function handleMarkerSelected($user)
    {
        $this->userSelected = DB::table("asignaciones as a")
            ->join('trackings as t', 't.asignacion_id', '=', 'a.asignacion_id' )
            ->where('a.piloto_id', "=", $user)
            ->select('t.latitude as lat', 't.longitude as long', 'a.asignacion_id')
            ->first();

    }

    public function handleMoreInfo()
    {

        $this->moreInfo = $this->userSelected = DB::table("viajes")
            ->join('pilotos as pl', 'pl.piloto_id', '=', 'viajes.piloto_id')
            ->join('camiones as cam', 'cam.camion_id', '=', 'viajes.camion_id')
            ->join('ubicaciones as destino', 'destino.ubicacion_id', '=', 'viajes.destino_id')
            ->join('ubicaciones as origen', 'origen.ubicacion_id', '=', 'viajes.origen_id')
            ->select('destino.name as destino','origen.name as origen','cam.chasis', 'cam.placa', 'viajes.mercaderia', 'pl.name as info', 'pl.piloto_id')
            ->where('viajes.piloto_id', "=", $this->userSelected->piloto_id)
            ->first();

    }

    public function mount()
    {
        $this->markers2 = DB::table('trackings as t1')
            ->join(DB::raw('(SELECT asignacion_id, MAX(created_at) AS last_createdAt FROM trackings GROUP BY asignacion_id) as t2'), function ($join) {
                $join->on('t1.asignacion_id', '=', 't2.asignacion_id');
            })
            ->join('asignaciones as a', 'a.asignacion_id', '=', 't1.asignacion_id')
            ->select( 'a.piloto_id', 't1.*' )
            ->where('a.status', '=', false)
            ->whereDate('t1.created_at', now())
            ->get()
            ->map(function ($item) {
                return [
                    'lat' => $item->latitude,
                    'long' => $item->longitude,
                    'info' => "-",
                    'mercaderia' => "-",
                    'last_sync' => $item->created_at,
                    'piloto_id' => $item->piloto_id,
                ];
            })
            ->toArray();

    }
    public function render()
    {
        return view('livewire.show-trackin-dashbord');
    }

    public function search() {
        if ($this->selectedOption) {
            $this->dataSelected = json_decode($this->selectedOption, true);
        } else {
            $this->selectedOption = null;
        }
    }

}
