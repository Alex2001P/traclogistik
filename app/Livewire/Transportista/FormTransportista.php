<?php

namespace App\Livewire\Transportista;

use App\Models\AsignacionesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FormTransportista extends Component
{

    public $name;
    public $placa;
    public $contenedorSelected = null;
    public $pilotoSelected = null;
    public $camionSelected = null;
    public $ubicacion;
    public $km;
    public $lastname;
    public $telefono;
    public $confirmCreatePiloto = false;
    public $selectedOption = null;
    public $options = [];

    public function render()
    {
        $usuario = Auth::user();
        $contenedores = DB::table('contenedores')
            ->join('size_contenedores as sc', 'contenedores.size', '=', 'sc.size_contenedor_id')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('asignaciones')
                    ->whereColumn('asignaciones.contenedor_id', 'contenedores.id')
                    ->where('asignaciones.status', '=', false);
            })
            ->select('contenedores.*', 'sc.size_contenedor_id', 'sc.name as contenedorName')
            ->get();

        $camiones = DB::table('camiones')
            ->where('camiones.transportista_id', '=', $usuario->transportista_id )
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('asignaciones')
                    ->whereColumn('asignaciones.camion_id', 'camiones.camion_id')
                ->where('asignaciones.status', '=', false);
            })
            ->get();

        $pilotos = DB::table('pilotos')
            ->where('pilotos.transportista_id', '=', $usuario->transportista_id )
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('asignaciones')
                    ->whereColumn('asignaciones.piloto_id', 'pilotos.piloto_id')
                    ->where('asignaciones.status', '=', false);
            })
            ->get();

        return view('livewire.transportista.form-transportista', ['contenedores' => $contenedores, 'pilotos' => $pilotos , 'camiones' => $camiones]);
    }

    public function onOpenModal() {
        $this->confirmCreatePiloto = true;
    }

    public function save(Request $request)
    {

        $usuario = Auth::user();
        if($usuario->transportista_id !== null){
            AsignacionesModel::create([
                'contenedor_id' => $this->contenedorSelected,
                'ubicacion' => $this->ubicacion,
                'km' => $this->km,
                'camion_id' => $this->camionSelected,
                'piloto_id' => $this->pilotoSelected,
                'transportista_id' => $usuario->transportista_id,
            ]);

            return redirect()->to('/transportista')
                ->with('status', 'Status Creado!');
        }

        AsignacionesModel::create([
            'placa' => $this->placa,
            'contenedor_id' => $this->contenedorSelected,
            'ubicacion' => $this->ubicacion,
            'km' => $this->km,
            'transportista_id' => $this->selectedOption,
        ]);

        $this->contenedorSelected = null;
        $this->ubicacion = null;
        $this->km = null;
        $this->camionSelected = null;
        $this->pilotoSelected = null;
        return redirect()->to('/transportista')
            ->with('status', 'Status Creado!');
    }
}
