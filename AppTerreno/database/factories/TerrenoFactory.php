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
        $imagenesRandom = fake()->randomElements($this->imagenesUnsplash, fake()->numberBetween(2, 5));
        
        $largo = fake()->randomFloat(2, 8, 17);
        $ancho = fake()->randomFloat(2, 7, 14);
        $superficie = $largo * $ancho;

        return [
            'idUsuario' => Usuario::factory([
                'tipoUsuario' => 'vendedor'
            ]),

            'nombre' => fake()->optional(0.8)->passthrough(
                fake()->randomElement(['Lote', 'Terreno']) . fake()->numberBetween(1, 2017)
            ),

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
            'largo' => $largo,
            'ancho' => $ancho,

            'descripcion' => fake()->randomElement([
                'Magnífico terreno residencial ubicado en una de las zonas con mayor crecimiento y plusvalía de la ciudad. Cuenta con topografía completamente plana, ideal para desarrollar un proyecto residencial a medida. Acceso rápido a avenidas principales, centros comerciales y escuelas de prestigio. Servicios a pie de calle listos para contratación.',
                'Oportunidad única para inversionistas y desarrolladores. Terreno de forma regular con excelente frente, situado dentro de un fraccionamiento privado con vigilancia las 24 horas, acceso controlado y amenidades exclusivas como casa club y áreas verdes. Documentación en regla y listo para escriturar.',
                'Predio urbano de uso mixto ideal para proyecto comercial o departamentos. Ubicado en esquina estratégica con alto flujo vehicular y peatonal, rodeado de comercios consolidados. Una opción inmejorable para asegurar un retorno de inversión a corto plazo en una ubicación privilegiada.',
                'Hermoso lote campestre rodeado de naturaleza, perfecto para construir una casa de campo o de fin de semana para la familia. Cuenta con una vista panorámica espectacular, ambiente tranquilo y alejado del ruido de la ciudad, pero con conectividad a solo 15 minutos de la zona urbana. Cuenta con factibilidad de agua y luz.',
                'Terreno plano habitacional en calle cerrada muy tranquila y segura. Excelente orientación que permite un aprovechamiento óptimo de la luz natural para el diseño arquitectónico. Cercano a parques públicos, supermercados y transporte; ideal para familias que buscan construir su primer patrimonio.',
                'Predio de dimensiones premium con factibilidad para subdivisión o desarrollo de vivienda horizontal. Ubicado en zona residencial consolidada con todos los servicios subterráneos disponibles (agua, luz, drenaje e internet de alta velocidad). Acceso pavimentado y libre de inundaciones.',
                'Lote residencial premium ubicado frente a área verde dentro de coto privado. El diseño del fraccionamiento ofrece un entorno seguro, familiar y con calles de concreto hidráulico. Una inversión segura en una ubicación con alta demanda y excelente proyección a futuro.'
            ]),

            'precio' => fake()->randomFloat(2, 574310, 2600000),
            'superficie' => $superficie,
            'zonificacion' => fake()->randomElement(['Residencial', 'Comercial', 'Industrial', 'Agricola', 'Mixta']),
            'pendiente' => fake()->randomElement(['Plana', 'Semi-plana', 'Con pendiente']),
            'imagenes' => $imagenesRandom,
            'fechaCompra' => fake()->dateTimeBetween('-7 months', '-5 months')->format('Y-m-d'),
            'fechaVenta' => $estado === 'VENDIDO' ? fake()->dateTimeBetween('-6 years', 'now')->format('Y-m-d') : null,
        ];
    }
}