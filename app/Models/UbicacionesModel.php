<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionesModel extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones';
    protected $primaryKey = 'ubicacion_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['name', 'latitude', 'longitude', 'created_at', 'updated_at'];

}
