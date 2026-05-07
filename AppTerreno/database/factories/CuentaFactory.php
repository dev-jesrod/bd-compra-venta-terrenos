<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cuenta;
use App\Models\Usuario;

class CuentaFactory extends Factory
{
    protected $model = Cuenta::class;

    public function definition(): array
    {
        return [
            'idUsuario' => Usuario::factory(), 
            'numeroCuenta' => fake()->unique()->numerify('##################'),
            'banco' => fake()->randomElement([
                'BBVA',
                'Banorte',
                'Santander',
                'HSBC',
                'Citibanamex'
            ]),
        ];
    }
}
