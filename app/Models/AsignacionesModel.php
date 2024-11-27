<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionesModel extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';
    protected $primaryKey = 'asignacion_id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['contenedor_id', 'size_id', 'ubicacion', 'km', 'transportista_id', 'camion_id', 'piloto_id'];

    public function contenedor_id()
    {
        return $this->belongsTo(ContenedoresModel::class, 'id');
    }

    public function size_id()
    {
        return $this->belongsTo(SizeContenedoresModel::class, 'size_contenedor_id');
    }

    public function piloto_id()
    {
        return $this->belongsTo(PilotosModel::class, 'piloto_id');
    }

    public function camion_id()
    {
        return $this->belongsTo(CamionesModel::class, 'camion_id');
    }

    public function transportista_id()
    {
        return $this->belongsTo(TransportistasModel::class, 'id');
    }
}
