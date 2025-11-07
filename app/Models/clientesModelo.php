<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class clientesModelo extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'ID_CLIENTES';
    public $incrementing = false;
    protected $keyType = 'string'; // o 'int' si documentoCliente es número
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

