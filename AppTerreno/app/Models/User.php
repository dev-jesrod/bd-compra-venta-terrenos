<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Registra un nuevo usuario aplicando validación a nivel de modelo.
     * Esto asegura que nunca se cree un usuario inválido desde ninguna 
     * parte del código (no solo desde el controlador).
     *
     * @param array $datos
     * @return User
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function registrarUsuario(array $datos): self
    {
        // 1. Validación estricta a nivel del Modelo
        $validador = \Illuminate\Support\Facades\Validator::make($datos, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validador->fails()) {
            throw new \Illuminate\Validation\ValidationException($validador);
        }

        // 2. Creación e instanciación del modelo
        return self::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($datos['password']),
        ]);
    }
}
