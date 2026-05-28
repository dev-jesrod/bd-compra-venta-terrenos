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
        'idUsuario',
        'nombre',
        'ubicacion',
        'estado',
        'estado_verificacion',
        'motivo_rechazo',
        'largo',
        'ancho',
        'descripcion',
        'precio',
        'imagenes',
        'fechaCompra',
        'fechaVenta',
        'superficie',
        'zonificacion',
        'pendiente'
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

            if (is_string($decoded)) {
                $decoded = json_decode($decoded, true);
            }

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

    // Scope para terrenos verificados (aprobados por validación)
    public function scopeVerificado(Builder $query)
    {
        return $query->where('estado_verificacion', 'APROBADO');
    }

    // Scope para terrenos pendientes de verificación
    public function scopePendienteVerificacion(Builder $query)
    {
        return $query->where('estado_verificacion', 'PENDIENTE');
    }

    // Scope para disponibles y verificados (para catálogo público)
    public function scopeDisponibleVerificado(Builder $query)
    {
        return $query->where('estado', 'DISPONIBLE')->where('estado_verificacion', 'APROBADO');
    }

    // Scope para aprobados (compatibilidad)
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

    public function leads()
    {
        return $this->hasMany(Lead::class, 'idTerreno', 'idTerreno');
    }

    public function visitas()
    {
        return $this->hasMany(VisitaTerreno::class, 'idTerreno', 'idTerreno');
    }
}
