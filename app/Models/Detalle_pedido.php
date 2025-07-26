<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalle_pedidos extends Model
{
    protected $fillable = [
        'cliente_id',
        'fecha',
        'estado'
        
    ];

    public function turno()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

}

