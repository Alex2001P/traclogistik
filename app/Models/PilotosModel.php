<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StatusPiloto;

class PilotosModel extends Model
{
    use HasFactory;

    protected $table = 'pilotos';
    protected $primaryKey = 'piloto_id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['name', 'lastname', 'telefono', 'status_id', 'transportista_id'];

    public function status_pilotos()
    {
        return $this->belongsTo(StatusPiloto::class, 'status_id');
    }
}
