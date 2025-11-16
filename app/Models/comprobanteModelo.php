<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class comprobanteModelo extends Model
{

    use HasFactory;
    protected $table = 'comprobante';
    protected $primaryKey = "ID_COMPROBANTE";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
    protected $fillable = [
        'ID_COMPROBANTE',
        'ID_INFORME',
        'ID_CLIENTES',
        'ID_ADMINISTRADOR',
        'Monto',
        'Fecha',
        'Estado_pago',
    ];
}
