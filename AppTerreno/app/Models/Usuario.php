<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'tipoUsuario','nombre','apellido1','apellido2',
        'sexo','fechaNacimiento','contrasena',
        'foto','estado','curp','telefono','email'
    ];

    // Relaciones
    public function cliente()
    {
        return $this->hasOne(DatoCliente::class, 'idUsuario');
    }

    public function vendedor()
    {
        return $this->hasOne(DatoVendedor::class, 'idUsuario');
    }

    public function cuenta()
    {
        return $this->hasOne(Cuenta::class, 'idUsuario');
    }

    public function terrenos()
    {
        return $this->hasMany(Terreno::class, 'idUsuario');
    }
}