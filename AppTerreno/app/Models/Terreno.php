<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terreno extends Model
{
    use HasFactory;

    protected $table = 'terrenos';
    protected $primaryKey = 'idTerreno';

    protected $fillable = [
        'idUsuario','nombre','ubicacion','estado','largo',
        'ancho','descripcion','precio',
        'fechaCompra','fechaVenta'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}