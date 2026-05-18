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
        'idUsuario', 'nombre', 'ubicacion', 'estado', 'largo',
        'ancho', 'descripcion', 'precio', 'superficie',
        'zonificacion', 'pendiente', 'imagenes',
        'fechaCompra', 'fechaVenta'
    ];

    protected $casts = [
        'imagenes' => 'array',
    ];

    public function getImagenesAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        if (is_array($value)) {
            $decoded = $value;
        } elseif (is_string($value)) {
            $decoded = json_decode($value, true);
            if (!is_array($decoded)) {
                return [];
            }
        } else {
            return [];
        }

        return array_map(function ($path) {
            if (str_starts_with($path, 'http')) {
                return $path;
            }
            return asset('storage/' . $path);
        }, $decoded);
    }

    public function getImagenPrincipalAttribute()
    {
        $imagenes = $this->imagenes;
        return !empty($imagenes) ? $imagenes[0] : null;
    }

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
