<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Terreno;
use App\Models\Usuario;

class TerrenoFactory extends Factory
{
    protected $model = Terreno::class;

    public function definition(): array
    {
     $estado = fake()->randomElement(['DISPONIBLE','VENDIDO','RESERVADO']);

     return [
        'idUsuario' => Usuario::where('tipoUsuario','vendedor')
            ->inRandomOrder()
            ->first()
            ->idUsuario,

        'nombre' => fake()->optional()->word(),
        'estado' => $estado,
        'largo' => fake()->randomFloat(2, 10, 100),
        'ancho' => fake()->randomFloat(2, 10, 100),
        'descripcion' => fake()->sentence(),
        'precio' => fake()->randomFloat(2, 50000, 500000),
        'fechaCompra' => fake()->date(),
        'fechaVenta' => $estado === 'VENDIDO' ? fake()->date() : null,
    ];
}
}