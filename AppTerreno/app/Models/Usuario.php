<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'tipoUsuario','nombre','apellido1','apellido2',
        'sexo','fechaNacimiento','contrasena',
        'foto','estado','curp','telefono','email'
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

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