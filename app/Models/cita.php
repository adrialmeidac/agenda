<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contacto;

class Cita extends Model
{
 protected $fillable = [
    'titulo',
    'fecha',
    'hora',
    'descripcion',
];

public function contacto()
{
    return $this->belongsTo(Contacto::class);
}
}