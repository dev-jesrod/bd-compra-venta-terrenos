<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'tipoUsuario' => fake()->randomElement(['admin','cliente']),
            'nombre' => fake()->firstName(),
            'apellido1' => fake()->lastName(),
            'apellido2' => fake()->lastName(),
            'sexo' => fake()->randomElement(['M','F']),
            'fechaNacimiento' => fake()->date(),
            'curp' => fake()->unique()->bothify('????######??????'),
            'telefono' => fake()->unique()->numerify('##########'),
            'email' => fake()->unique()->safeEmail(),
            'contrasena' => bcrypt('12345678'),
            'foto' => null,
            'estado' => true,
        ];
    }
}