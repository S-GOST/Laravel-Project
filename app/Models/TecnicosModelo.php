<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\factories\HasFactory;

class tecnicosModelo extends Authenticatable
{

    use HasFactory;
    protected $table = 'tecnicos';
    protected $primaryKey = "ID_TECNICOS";
    public $incrementing = false;
    protected $KeyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'ID_TECNICOS',
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
