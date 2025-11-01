<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class administradoresModelo extends Model
{
        // Nombre de la tabla
    protected $table = 'administradores';

    // Clave primaria
    protected $primaryKey = 'ID_ADMINISTRADOR';

    // Si no usas timestamps (created_at y updated_at)
    public $timestamps = false;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'Nombre',
        'Apellido',
        'Email',
        'Telefono'
        // agrega aquí los demás campos de tu tabla
    ];
}
