<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Terreno extends Model
{
    use HasFactory;

    protected $table = 'terrenos';
    protected $primaryKey = 'idTerreno';

    protected $fillable = [
        'idUsuario','nombre','estado','largo',
        'ancho','descripcion','precio',
        'fechaCompra','fechaVenta'
    ];

     // Scope para aprobados
    public function scopeAprobado(Builder $query)
    {
        return $query->where('estado', 'DISPONIBLE'); 
        
    }

    // Scope para disponibles
    public function scopeDisponible(Builder $query)
    {
        return $query->where('estado', 'DISPONIBLE');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}