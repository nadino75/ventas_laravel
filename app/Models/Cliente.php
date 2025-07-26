<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $fillable = [
        'ci',
        'nombre_completo',
        'email',
        'telefono',
        'fecha_nacimiento'
        
    ];
}


