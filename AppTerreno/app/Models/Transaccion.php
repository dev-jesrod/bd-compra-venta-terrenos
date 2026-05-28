<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';
    protected $primaryKey = 'idTransaccion';

    protected $fillable = [
        'idUsuario',
        'idTerreno',
        'idCuenta',
        'metodoPago',
        'estadoPago',
        'monto',
        'fechaTransaccion'
    ];

    // Relación con el Usuario (Comprador)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    // Relación con el Terreno
    public function terreno()
    {
        return $this->belongsTo(Terreno::class, 'idTerreno', 'idTerreno');
    }

    // Relación con la Cuenta
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'idCuenta', 'idCuenta');
    }
}
