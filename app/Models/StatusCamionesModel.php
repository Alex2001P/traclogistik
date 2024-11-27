<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCamionesModel extends Model
{
    use HasFactory;

    protected $table = 'status_camiones';
    protected $primaryKey = 'status_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['name', 'description'];
}
