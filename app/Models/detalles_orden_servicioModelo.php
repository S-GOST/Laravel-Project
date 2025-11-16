<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class detalles_orden_servicioModelo extends Model
{

    use HasFactory;
    protected $table = 'detalles_orden_servicio';
    protected $primaryKey = "ID_DETALLES_ORDEN_SERVICIO";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
    protected $fillable = [
        'ID_DETALLES_ORDEN_SERVICIO',
        'ID_ORDEN_SERVICIO',
        'ID_SERVICIOS',
        'ID_PRODUCTOS',
        'Garantia',
        'Estado',
        'Precio'
    ];
}
