<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class productosModelo extends Model
{

    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = "ID_PRODUCTOS";
    public $incrementing = false;
    protected $KeyType = 'varchar';
    public $timestamps = false;
    protected $fillable = [
        'ID_PRODUCTOS',
        'Categoria',
        'Marca',
        'Nombre',
        'Garantia',
        'Precio',
        'Cantidad',
        'Estado'
    ];
}
