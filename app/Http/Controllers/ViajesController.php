<?php

namespace App\Http\Controllers;

use App\Models\AsignacionesModel;
use App\Models\TrackingModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViajesController extends Controller
{
    public function getViaje($userId){

        $piloto = User::find($userId);

        if(!$piloto){
            return response()->json(['data' => null], 201);
        }

        $viaje = DB::table('asignaciones as a')
            ->join('cortes as c', 'c.id', '=', 'a.corte_id')
            ->where('a.status', '=', false)
            ->where('a.piloto_id', '=', $piloto->piloto_id)
            ->select('a.ubicacion', 'a.asignacion_id', 'c.turno', 'c.finca')
            ->get();

        if($viaje->isEmpty()){
            return response()->json(['data' => null], 201);
        }

        return response()->json([
            'data' => $viaje
        ]);
    }

    public function saveTracking(Request $request){

        TrackingModel::create([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'asignacion_id' => $request->asignacion_id
        ]);

        return response()->json([
            'message' => 'Tracking guardado exitosamente'
        ], 201);
    }
}
