<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeContenedoresModel extends Model
{
    use HasFactory;

    protected $table = 'size_contenedores';
    protected $primaryKey = 'size_contenedor_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['name'];
}
