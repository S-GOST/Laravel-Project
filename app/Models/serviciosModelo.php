<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class serviciosModelo extends Model
{

    use HasFactory;
    protected $table = 'servicios';
    protected $primaryKey = "ID_SERVICIOS";
    public $incrementing = false;
    protected $KeyType = 'varchar';
    public $timestamps = false;
    protected $fillable = [
        'ID_SERVICIOS',
        'Nombre',
        'Categoria',
        'Garantia',
        'Estado',
        'Precio'
    ];
}
