<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Contacto extends Model
{
    protected $fillable = [
    'nombre',
    'apellido',
];
public function citas()
{
    return $this->hasMany(Cita::class);
}

}
