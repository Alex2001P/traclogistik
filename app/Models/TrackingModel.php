<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingModel extends Model
{
    use HasFactory;

    protected $table = 'trackings';
    protected $primaryKey = 'tracking_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['asignacion_id', 'latitude', 'longitude'];

    public function asignacion_id()
    {
        return $this->belongsTo(AsignacionesModel::class, 'asignacion_id');
    }

}
