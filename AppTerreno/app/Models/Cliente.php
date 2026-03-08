<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clientes';
    protected $primaryKey = 'idCliente';

    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'telefono',
        'email',
        'contrasena',
    ];

    protected $hidden = [
        'contrasena',
    ];

    /**
     * Override the default password column for authentication.
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Define the password name for auth driver.
     */
    public function getAuthPasswordName()
    {
        return 'contrasena';
    }

    /**
     * Registra un nuevo cliente aplicando validación a nivel de modelo.
     *
     * @param array $datos
     * @return Cliente
     * @throws ValidationException
     */
    public static function registrarUsuario(array $datos): self
    {
        // Dividir el 'name' del formulario en nombre y apellido1
        $partesNombre = explode(' ', trim($datos['name']), 2);
        $nombre = $partesNombre[0];
        $apellido1 = isset($partesNombre[1]) ? $partesNombre[1] : 'N/A'; // N/A si no ingresan apellido

        $datosParaValidar = [
            'nombre' => $nombre,
            'apellido1' => $apellido1,
            'email' => $datos['email'],
            'contrasena' => $datos['password'],
        ];

        // 1. Validación estricta a nivel del Modelo
        $validador = Validator::make($datosParaValidar, [
            'nombre' => 'required|string|max:40',
            'apellido1' => 'required|string|max:40',
            'email' => 'required|string|email|max:80|unique:clientes,email',
            'contrasena' => 'required|string|min:8',
        ]);

        if ($validador->fails()) {
            throw new ValidationException($validador);
        }

        // 2. Creación e instanciación del modelo
        return self::create([
            'nombre' => $datosParaValidar['nombre'],
            'apellido1' => $datosParaValidar['apellido1'],
            'email' => $datosParaValidar['email'],
            'contrasena' => Hash::make($datosParaValidar['contrasena']),
        ]);
    }
}
