<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class TecnicosModelo extends Model
{

    use HasFactory;
    protected $table = 'Tecnicos';
    protected $primaryKey = "ID_TECNICOS";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
    protected $fillable = [
        'ID_TECNICOS',
        'Nombre',
        'TipoDocumento',
        'Correo',
        'Telefono'
    ];
}
