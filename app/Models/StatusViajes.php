<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusViajes extends Model
{
    use HasFactory;

    protected $table = 'status_viajes';
    protected $primaryKey = 'status_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['name', 'description'];
}
