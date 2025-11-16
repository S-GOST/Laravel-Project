<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class informeModelo extends Model
{

    use HasFactory;
    protected $table = 'informe';
    protected $primaryKey = "ID_INFORME";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
    protected $fillable = [
        'ID_INFORME',
        'ID_DETALLES_ORDEN_SERVICIO',
        'ID_ADMINISTRADOR',
        'ID_TECNICOS',
        'Descripcion',
        'Fecha',
        'Estado',
    ];
}
