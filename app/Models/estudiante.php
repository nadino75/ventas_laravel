<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    protected $fillable =[
        'id',
        'nombre',
        'apellidos',
        'ci',
        'correo',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'genero',
        'carrera',
        'anio_ingreso',
        'estado'

    ];
}
