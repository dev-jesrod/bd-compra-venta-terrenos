<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaTerreno extends Model
{
    use HasFactory;

    protected $table = 'terreno_visitas';
    protected $primaryKey = 'idVisita';

    protected $fillable = [
        'idTerreno',
        'idUsuario',
    ];

    public function terreno()
    {
        return $this->belongsTo(Terreno::class, 'idTerreno', 'idTerreno');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
