<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class administradoresModelo extends Model
{
        // Nombre de la tabla
    protected $table = 'administradores';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'Nombre',
        'Correo',
        'Contrasena',
        'Telefono'
        // agrega aquí los demás campos de tu tabla
    ];
        public $timestamps = false;
}
