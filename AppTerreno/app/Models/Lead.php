<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';
    protected $primaryKey = 'idLead';

    protected $fillable = [
        'idTerreno',
        'nombre',
        'email',
        'telefono',
        'mensaje',
        'estado'
    ];

    public function terreno()
    {
        return $this->belongsTo(Terreno::class, 'idTerreno', 'idTerreno');
    }
}
