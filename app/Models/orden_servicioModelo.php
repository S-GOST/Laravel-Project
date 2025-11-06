<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orden_servicioModelo extends Model
{
        // Nombre exacto de la tabla en MySQL
    protected $table = 'orden_servicio';

    // Campos asignables
    protected $fillable = [
        'ID_CLIENTES',
        'ID_ADMINISTRADORES',
        'ID_TECNICOS',
        'ID_MOTOS',
        'Fecha_inicio',
        'Fecha_estimada',
        'Fecha_fin',
        'Estado',
        'Descripcion'
    ];
        public $timestamps = false;
}
