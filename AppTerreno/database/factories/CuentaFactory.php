<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DatoCliente;
use App\Models\DatoVendedor;

class CuentaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'idCliente' => DatoCliente::inRandomOrder()->first()->idCliente,
            'idVendedor' => DatoVendedor::inRandomOrder()->first()->idVendedor,
            'saldo' => $this->faker->randomFloat(2, 1000, 10000),
        ];
    }
}