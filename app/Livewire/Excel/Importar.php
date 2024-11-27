<?php

namespace App\Livewire\Excel;
use App\Models\CortesModel;
use App\Models\Excel\CortesImport;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Livewire\Component;

class Importar extends Component
{
    use WithFileUploads;

    public $archivo;
    public $hasData = false;

    public function importarCortes()
    {
        try {
            $hasDataToday = DB::table('cortes')
                ->where('is_asigned', '=', false)
                ->whereDate('created_at', now())
                ->count();

            if($hasDataToday > 0){
                $this->archivo = null;
                $this->hasData = true;
                $this->js("alert('Ya cuenta informacion del dia de hoy!, eliminala para poder continuar.')");
                return;
            }

            $this->validate([
                'archivo' => 'required|file|mimes:xls,xlsx',
            ]);


            Excel::import(new CortesImport(), $this->archivo->getRealPath());

            $this->js("alert('Importacion realizada exitosamente')");
            session()->flash('message', 'Archivo importado correctamente.');
        } catch (\Exception $e) {
            $this->js("alert('Ocurrió un error al importar el archivo.')");
        }
    }


    public function render()
    {
        return view('livewire.excel.importar');
    }

    public function deleteDataToday(){
        CortesModel::whereDate('created_at', Carbon::today())->where('is_asigned', '=', false)->delete();
       $this->hasData = false;
    }
}
