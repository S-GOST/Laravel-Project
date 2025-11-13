<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class orden_servicioModelo extends Model
{
    use HasFactory;
    protected $table = 'orden_servicio';
    protected $primaryKey = 'ID_ORDEN_SERVICIO';
    public $incrementing = false;
    protected $keyType = 'int'; // o 'int' si documentoCliente es número
    public $timestamps = false;
    protected $fillable=[
        'ID_ORDEN_SERVICIO',
        'ID_CLIENTES',
        'ID_ADMINISTRADOR',
        'ID_TECNICOS',
        'ID_MOTOS',
        'Fecha_inicio',
        'Fecha_estimada',
        'Fecha_fin',
        'Estado',
    ];
}
