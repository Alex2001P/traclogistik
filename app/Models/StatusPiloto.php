<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPiloto extends Model
{
    use HasFactory;

    protected $table = 'status_pilotos';
    protected $primaryKey = 'status_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['name', 'description'];

}
