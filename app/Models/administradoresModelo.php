<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdministradoresModelo extends  Authenticatable
{
    use HasFactory;

    protected $table = 'administradores';
    protected $primaryKey = 'ID_ADMINISTRADOR';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'ID_ADMINISTRADOR',
        'Nombre',
        'usuario',
        'contrasena',
        'Correo',
        'TipoDocumento',
        'Documento'
    ];

    public function getAuthPassword()
    {
        return $this->contrasena; // nombre EXACTO de la columna
    }
}
