<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StatusCamionesModel;

class CamionesModel extends Model
{
    use HasFactory;

    protected $table = 'camiones';
    protected $primaryKey = 'camion_id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['placa', 'chasis', 'status_id', 'transportista_id'];

    public function status_camiones()
    {
        return $this->belongsTo(StatusCamionesModel::class, 'status_id');
    }
}
