<?php

namespace App\Models;

use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class clientesModelo extends Authenticatable
{
    protected $table = 'clientes';
    protected $primaryKey = 'ID_CLIENTES';
    public $incrementing = false;
    protected $keyType = 'string'; // o 'int' si documentoCliente es número
    public $timestamps = false;
    protected $fillable=[
        'ID_CLIENTES',
        'Ubicacion',
        'Nombre',
        'usuario',
        'contrasena',
        'TipoDocumento',
        'Correo',
        'Telefono'
    ];
    public function getAuthPassword()
    {
        return $this->contrasena; // nombre EXACTO de la columna
    }
}

