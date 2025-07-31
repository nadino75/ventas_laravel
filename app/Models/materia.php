<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'codigo_materia',
        'nombre_materia',
        'grupo',
        'docente',
        'semestre',
        'turno',
        'fecha_solicitud',
        'motivo',
        'estado',
        'observaciones',
        'id_estudiantes'  // recuerda agregar este si lo usas como FK
    ];

    // Cast para fechas
    protected $casts = [
        'fecha_solicitud' => 'datetime',
    ];

    // Relación con Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiantes');
    }
}
