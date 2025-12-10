<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 Importante
use Illuminate\Notifications\Notifiable;

class clientesModelo extends Authenticatable
{
    use Notifiable;

    protected $table = 'clientes';
    protected $primaryKey = 'ID_CLIENTES';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ID_CLIENTES',
        'Ubicacion',
        'Nombre',
        'usuario',
        'contrasena',
        'TipoDocumento',
        'Correo',
        'Telefono',
    ];

    protected $hidden = [
        'contrasena',
    ];

    // 👇 Le decimos a Laravel qué campo usar como contraseña
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
