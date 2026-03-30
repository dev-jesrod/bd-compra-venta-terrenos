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
        'idUsuario',
        'numeroCuenta',
        'banco'
    ];

    public $incrementing = true;

    protected $keyType = 'int';

    // 🔗 Relación: una cuenta pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}