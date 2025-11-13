<?php

namespace App\Models;

use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\Model;


class clientesModelo extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'ID_CLIENTES';
    public $incrementing = false;
    protected $keyType = 'int'; // o 'int' si documentoCliente es número
    public $timestamps = false;
    protected $fillable=[
        'ID_CLIENTES',
        'ID_UBICACION',
        'Nombre',
        'TipoDocumento',
        'Correo',
        'Telefono'
    ];
}

