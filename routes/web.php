<?php

use App\Livewire\TransportistaScreen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Livewire\StatusPilotosController;
use App\Livewire\ShowTrackinDashbord;
use App\Livewire\ResumenScreen;
use App\Livewire\Camiones;
use App\Livewire\Pilotos;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pedidos', function () {
    return view('livewire.pedidos-screen');
})->name('pedidos');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //Pilotos
    Route::get('/pilotos', function () {
        return view('livewire.pilotos');
    })->name('pilotos');

    Route::get('/status_pilotos', function () {
        return view('livewire.status-pilotos');
    })->name('status_pilotos');

    Route::get('/statusPilotos', StatusPilotosController::class);
    Route::get('/show-trackin-dashbord', ShowTrackinDashbord::class);
    Route::get('/pilotosView', Pilotos::class);

    //Camiones
    Route::get('/status_camiones', function () {
        return view('livewire.status-camiones');
    })->name('status_camiones');

    Route::get('/camiones', function () {
        return view('livewire.camiones');
    })->name('camiones');

    Route::get('/camionesView', Camiones::class);

    //transportista
    Route::get('/transportista', function () {
        return view('livewire.transportista-screen');
    })->name('transportista');

    //pedidos
    Route::get('/oficina', function () {
        return view('livewire.oficina-screen');
    })->name('oficina');

    //transportista
    Route::get('/createTransportista', function () {
        return view('livewire.create-transportista-screen');
    })->name('createTransportista');

    //registrar usuarios
    Route::get('/registrarUsuarios', function () {
        return view('livewire.registrar-usuarios-screen');
    })->name('registrarUsuarios');

    //registrar usuarios
    Route::get('/createUserTransportista', function () {
        return view('livewire.create-user-transportista');
    })->name('createUserTransportista');

    Route::get('/historial', function () {
        return view('livewire.historial-screen');
    })->name('historial');

    Route::get('/transportistaView', TransportistaScreen::class);

    //pedidos
    Route::get('/detalle-pedido/{id}', function ($id) {

        $asignaciones = DB::table("asignaciones as a")
            ->join('contenedores as c', 'c.id', '=', 'a.contenedor_id')
            ->join('size_contenedores as sc', 'c.size', '=', 'sc.size_contenedor_id')
            ->join('camiones', 'camiones.camion_id', '=', 'a.transportista_id')
            ->join('pilotos', 'pilotos.piloto_id', '=', 'a.piloto_id')
            ->join('cortes', 'cortes.id', '=', 'a.corte_id')
            ->select('cortes.finca','cortes.turno','cortes.ac','pilotos.name as namePiloto', 'pilotos.lastname as lastnamePiloto', 'pilotos.telefono','camiones.chasis','a.corte_id','a.ubicacion', 'camiones.placa', 'a.km', 'c.identificador', 'c.id as contenedor_id', 'sc.name', 'sc.size_contenedor_id')
            ->where('a.asignacion_id', $id)
            ->first();
        $corte = \App\Models\CortesModel::find($asignaciones->corte_id);
        // Aquí puedes pasar el id a la vista
        return view('livewire.resumen-screen', ['asignaciones' => $asignaciones, 'corte' => $corte]);
    })->name('detalle.pedido');

});




