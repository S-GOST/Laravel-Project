<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class AdministradoresModelo extends Authenticatable
{
    use HasFactory, Notifiable;

    // Especificar el nombre de la tabla (porque no sigue la convención de Laravel)
    protected $table = 'administradores';

    // Especificar la clave primaria
    protected $primaryKey = 'ID_ADMINISTRADOR';

    // Desactivar auto-increment si no es numérico
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ID_ADMINISTRADOR',
        'Nombre',
        'Correo',
        'TopDocumento',
        'Telefono',
        'Usuario',
        'Contrasena'
    ];

    protected $hidden = [
        'Contrasena',
        'remember_token',
    ];

    /**
     * Mutator para encriptar la contraseña usando Hash
     */
    public function setPasavodAttribute($value)
    {
        $this->attributes['Contrasena'] = Hash::make($value);
    }

    /**
     * Get the password for the user.
     * Esto es necesario para la autenticación de Laravel
     */
    public function getAuthPassword()
    {
        return $this->Contrasena;
    }

    /**
     * Verificar contraseña usando Hash
     */
    public function checkPassword($password)
    {
        return Hash::check($password, $this->Contrasena);
    }
}