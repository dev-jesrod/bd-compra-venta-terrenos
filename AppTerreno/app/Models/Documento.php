<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';
    protected $primaryKey = 'idDocumento';

    protected $fillable = [
        'idVendedor',
        'nombre',
        'ruta_archivo',
        'estado',
        'motivo_rechazo'
    ];

    public function vendedor()
    {
        return $this->belongsTo(DatoVendedor::class, 'idVendedor', 'idVendedor');
    }
}
