<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class ubicacionModelo extends Model
{

    use HasFactory;
    protected $table = 'ubicacion';
    protected $primaryKey = "ID_UBICACION";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
    protected $fillable = [
        'ID_UBICACION',
        'Departamento',
        'Ciudad',
        'Direccion'
    ];
}
