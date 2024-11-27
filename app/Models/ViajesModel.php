<?php

namespace App\Models;

use App\Livewire\StatusCamiones;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViajesModel extends Model
{
    use HasFactory;

    protected $table = 'viajes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['piloto_id', 'camion_id', 'destino_id', 'origen_id', 'mercaderia', 'peso', 'status_id', 'created_at', 'updated_at'];

    public function piloto()
    {
        return $this->belongsTo(PilotosModel::class, 'piloto_id');
    }

    public function camion()
    {
        return $this->belongsTo(CamionesModel::class, 'camion_id');
    }

    public function destino()
    {
        return $this->belongsTo(UbicacionesModel::class, 'destino_id');
    }

    public function origen()
    {
        return $this->belongsTo(UbicacionesModel::class, 'origen_id');
    }

    public function status()
    {
        return $this->belongsTo(StatusCamiones::class, 'status_id');
    }

}
