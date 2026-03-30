<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DatoCliente;
use App\Models\Usuario;

class DatoClienteFactory extends Factory
{
    protected $model = DatoCliente::class;

    public function definition(): array
    {
        return [
            'idUsuario' => Usuario::factory(),
        ];
    }
}