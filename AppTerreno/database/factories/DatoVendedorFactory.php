<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DatoVendedor;
use App\Models\Usuario;

class DatoVendedorFactory extends Factory
{
    protected $model = DatoVendedor::class;

    public function definition(): array
    {
        return [
            'idUsuario' => Usuario::factory([
                'tipoUsuario' => 'vendedor'
            ]),
            'rfc' => fake()->unique()->bothify('????######???'),
            'utilidad' => fake()->randomFloat(2, 1000, 50000),
        ];
    }
}