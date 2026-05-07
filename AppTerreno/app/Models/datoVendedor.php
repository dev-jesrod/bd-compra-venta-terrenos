<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoVendedor extends Model
{
    use HasFactory;

    protected $table = 'dato_vendedores'; 

    protected $primaryKey = 'idVendedor';

    protected $fillable = [
        'idUsuario',
        'rfc',
        'utilidad'
    ];

    public $incrementing = true;

    protected $keyType = 'int';
}