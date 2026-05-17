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
        $estado = fake()->randomElement(['DISPONIBLE', 'VENDIDO', 'RESERVADO']);
        
        return [

            'idUsuario' => Usuario::factory([
                'tipoUsuario' => 'vendedor'
            ]),

            'nombre' => fake()->optional(0.8)->passthrough(
                fake()->randomElement( [ 'Lote', 'Terreno'] ) . fake()->numberBetween( 1, 2017 )
            ),

            'estado' => $estado,

            'largo' => fake()->randomFloat(2, 8, 17),
            'ancho' => fake()->randomFloat(2, 7, 14),

            'descripcion' => fake()->randomElement( [
                'Magnífico terreno residencial ubicado en una de las zonas con mayor crecimiento y plusvalía de la ciudad. Cuenta con topografía completamente plana, ideal para desarrollar un proyecto residencial a medida. Acceso rápido a avenidas principales, centros comerciales y escuelas de prestigio. Servicios a pie de calle listos para contratación.',
    
                'Oportunidad única para inversionistas y desarrolladores. Terreno de forma regular con excelente frente, situado dentro de un fraccionamiento privado con vigilancia las 24 horas, acceso controlado y amenidades exclusivas como casa club y áreas verdes. Documentación en regla y listo para escriturar.',
    
                'Predio urbano de uso mixto ideal para proyecto comercial o departamentos. Ubicado en esquina estratégica con alto flujo vehicular y peatonal, rodeado de comercios consolidados. Una opción inmejorable para asegurar un retorno de inversión a corto plazo en una ubicación privilegiada.',
    
                'Hermoso lote campestre rodeado de naturaleza, perfecto para construir una casa de campo o de fin de semana para la familia. Cuenta con una vista panorámica espectacular, ambiente tranquilo y alejado del ruido de la ciudad, pero con conectividad a solo 15 minutos de la zona urbana. Cuenta con factibilidad de agua y luz.',
    
                'Terreno plano habitacional en calle cerrada muy tranquila y segura. Excelente orientación que permite un aprovechamiento óptimo de la luz natural para el diseño arquitectónico. Cercano a parques públicos, supermercados y transporte; ideal para familias que buscan construir su primer patrimonio.',
    
                'Predio de dimensiones premium con factibilidad para subdivisión o desarrollo de vivienda horizontal. Ubicado en zona residencial consolidada con todos los servicios subterráneos disponibles (agua, luz, drenaje e internet de alta velocidad). Acceso pavimentado y libre de inundaciones.',
    
                'Lote residencial premium ubicado frente a área verde dentro de coto privado. El diseño del fraccionamiento ofrece un entorno seguro, familiar y con calles de concreto hidráulico. Una inversión segura en una ubicación con alta demanda y excelente proyección a futuro.'
            ]),

            'precio' => fake()->randomFloat(2, 574310, 2600000),

            'fechaVenta' => fake()->dateTimeBetween('-6 years', 'now')->format('Y-m-d'),

            'fechaCompra' => fake()->dateTimeBetween('-7 months', '-5 months')
        ];
    }
}