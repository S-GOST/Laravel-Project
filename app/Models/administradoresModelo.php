<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class AdministradoresModelo extends Authenticatable
{
    use Notifiable;

    protected $table = 'administradores';
    protected $primaryKey = 'ID_ADMINISTRADOR';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    // Esto le dice a Laravel qué campo usar como "username"
    public function username()
    {
        return 'Usuario';
    }

    protected $fillable = [
        'ID_ADMINISTRADOR',
        'Nombre',
        'Correo',
        'TipoDocumento',
        'Telefono',
        'Usuario',
        'contrasena'
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    // ✅ MÉTODO ESENCIAL 1: Campo para autenticación
    public function getAuthIdentifierName()
    {
        return 'Usuario';
    }

    // ✅ MÉTODO ESENCIAL 2: Contraseña para autenticación
    public function getAuthPassword()
    {
        return $this->Contrasena;
    }

    // ✅ MÉTODO ESENCIAL 3: Encriptar contraseña
    public function setContrasenaAttribute($value)
    {
        $this->attributes['Contrasena'] = Hash::make($value);
    }
}