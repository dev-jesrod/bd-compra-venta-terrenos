<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Terreno;
use App\Models\Usuario;

class TerrenoFactory extends Factory
{
    protected $model = Terreno::class;

    private array $imagenesUnsplash = [
        'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1595815771614-ade9d652a65d?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1628075187659-e4d4b0394070?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1510784722466-f64c5b5c7c0b?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?w=800&h=600&fit=crop',
        'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&h=600&fit=crop',
    ];

    public function definition(): array
    {
        $estado = fake()->randomElement(['DISPONIBLE', 'VENDIDO', 'RESERVADO']);
        $vendedor = Usuario::where('tipoUsuario', 'vendedor')->inRandomOrder()->first();

        $imagenesRandom = fake()->randomElements($this->imagenesUnsplash, fake()->numberBetween(2, 5));

        return [
            'idUsuario' => $vendedor ? $vendedor->idUsuario : 1,

            'nombre' => fake()->randomElement([
                'Terreno Vista al Mar',
                'Lote en Zona Dorada',
                'Terreno Campestre Mazatlán',
                'Solar Urbano Centro',
                'Parcela Agricola',
                'Terreno Residencial',
                'Lote Comercial',
                'Terreno de Playa',
                'Rancho Ganadero',
                'Terreno en Precio',
            ]),

            'ubicacion' => fake()->randomElement([
                'Zona Dorada, Mazatlán, Sinaloa',
                'Centro Histórico, Mazatlán, Sinaloa',
                'Playa Sur, Mazatlán, Sinaloa',
                'El Verde, Culiacán, Sinaloa',
                'Las Quintas, Mazatlán, Sinaloa',
                'Cerro de la Cruz, Mazatlán, Sinaloa',
                'Fraccionamiento Los Pinos, Culiacán',
                'El Limón, El Fuerte, Sinaloa',
            ]),

            'estado' => $estado,
            'largo' => fake()->randomFloat(2, 10, 100),
            'ancho' => fake()->randomFloat(2, 10, 100),
            'descripcion' => fake()->paragraph(2),
            'precio' => fake()->randomFloat(2, 150000, 3500000),
            'superficie' => fake()->randomFloat(2, 100, 5000),
            'zonificacion' => fake()->randomElement(['Residencial', 'Comercial', 'Industrial', 'Agricola', 'Mixta']),
            'pendiente' => fake()->randomElement(['Plana', 'Semi-plana', 'Con pendiente']),
            'imagenes' => json_encode($imagenesRandom),
            'fechaCompra' => fake()->date('Y-m-d', '-2 years'),
            'fechaVenta' => $estado === 'VENDIDO' ? fake()->date('Y-m-d', 'now') : null,
        ];
    }
}