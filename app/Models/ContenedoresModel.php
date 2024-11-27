<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenedoresModel extends Model
{
    use HasFactory;

    protected $table = 'contenedores';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['size', 'identificador'];

    public function size_contenedor()
    {
        return $this->belongsTo(SizeContenedoresModel::class, 'size_contenedor_id');
    }
}
