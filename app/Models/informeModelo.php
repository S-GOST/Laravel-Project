<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class informeModelo extends Model
{
    use HasFactory;

    protected $table = 'informe';
    protected $primaryKey = "ID_INFORME";

    public $incrementing = false;
    protected $keyType = 'string'; // IDs como INF1, INF2

    public $timestamps = false;

    protected $fillable = [
        'ID_INFORME',
        'ID_DETALLES_ORDEN_SERVICIO',
        'ID_ADMINISTRADOR',
        'ID_TECNICOS',
        'Descripcion',
        'Fecha',
        'Estado'
    ];
}
