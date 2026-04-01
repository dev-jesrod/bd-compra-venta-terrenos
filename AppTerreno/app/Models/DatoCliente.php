<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoCliente extends Model
{
    use HasFactory;

    protected $table = 'dato_clientes';
    protected $primaryKey = 'idCliente';

    protected $fillable = ['idUsuario'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}