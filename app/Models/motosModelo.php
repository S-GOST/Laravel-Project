<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class motosModelo extends Model
{

    use HasFactory;
    protected $table = 'motos';
    protected $primaryKey = "ID_MOTOS";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
    protected $fillable = [
        'ID_MOTOS',
        'ID_CLIENTES',
        'Placa',
        'Modelo',
        'Marca',
        'Recorrido'
    ];
}
