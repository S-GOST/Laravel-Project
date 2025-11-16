<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class historialModelo extends Model
{

    use HasFactory;
    protected $table = 'historial';
    protected $primaryKey = "ID_HISTORIAL";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
    protected $fillable = [
        'ID_HISTORIAL',
        'ID_ORDEN_SERVICIO',
        'ID_COMPROBANTE',
        'ID_INFORME',
        'ID_TECNICOS',
        'ID_CLIENTES',
        'Descripcion',
        'Fecha_registro',
    ];
}