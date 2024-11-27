<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CortesModel extends Model
{
    use HasFactory;

    protected $table = 'cortes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['turno','finca','programado','ac', 'contenedor', 'contenedor2', 'obervaciones', 'placa', 'ubicacion', 'hora_aproximada_llegada', 'transporte', 'orden_corta'];

}
