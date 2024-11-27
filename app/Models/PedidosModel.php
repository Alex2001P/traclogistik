<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosModel extends Model
{
    use HasFactory;

    protected $table = 'cortes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['programado', 'ac', 'contenedor', 'contenedor2', 'obervaciones','placa','ubicacion','hora_aproximada_llegada','transporte', 'orden_corta', 'is_asigned'];

}
