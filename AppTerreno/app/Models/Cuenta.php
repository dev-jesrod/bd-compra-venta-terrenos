<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = 'cuentas';
    protected $primaryKey = 'idCuenta';

    protected $fillable = [
        'idCliente',
        'idVendedor',
        'saldo'
    ];

    public function cliente()
    {
        return $this->belongsTo(DatoCliente::class, 'idCliente', 'idCliente');
    }

    public function vendedor()
    {
        return $this->belongsTo(DatoVendedor::class, 'idVendedor', 'idVendedor');
    }
}