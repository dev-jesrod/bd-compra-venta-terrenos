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
        'idUsuario',
        'nombre',
        'estado',
        'largo',
        'ancho',
        'descripcion',
        'precio',
        'fechaVenta',
        'fechaCompra'
    ];

    public $incrementing = true;

    protected $keyType = 'int';

   
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}