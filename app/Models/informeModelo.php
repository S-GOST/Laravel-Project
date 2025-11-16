<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;

class informeModelo extends Model
{
    use HasFactory;

    protected $table = 'informe';
    protected $primaryKey = "ID_INFORME";

    public $incrementing = false;
    protected $keyType = 'string'; // IDs como INF1, INF2

    public $timestamps = false;

=======
use Illuminate\Database\Eloquent\factories\HasFactory;

class informeModelo extends Model
{

    use HasFactory;
    protected $table = 'informe';
    protected $primaryKey = "ID_INFORME";
    public $incrementing = false;
    protected $KeyTYpe = 'int';
    public $timestamps = false;
>>>>>>> 695223aa829ea892fc2dcf606afe22d31ec513a0
    protected $fillable = [
        'ID_INFORME',
        'ID_DETALLES_ORDEN_SERVICIO',
        'ID_ADMINISTRADOR',
        'ID_TECNICOS',
        'Descripcion',
        'Fecha',
<<<<<<< HEAD
        'Estado'
=======
        'Estado',
>>>>>>> 695223aa829ea892fc2dcf606afe22d31ec513a0
    ];
}
