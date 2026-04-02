<?php

namespace Database\Seeders;

use App\Models\DatoCliente;
use App\Models\DatoVendedor;
use App\Models\Cuenta;
use App\Models\Terreno;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuarios
        $vendedores = Usuario::factory(10)->create([
            'tipoUsuario' => 'vendedor'
        ]);

        $clientes = Usuario::factory(10)->create([
            'tipoUsuario' => 'cliente'
        ]);

        $admins = Usuario::factory(2)->create([
            'tipoUsuario' => 'admin'
        ]);

        // Datos vendedor
        $datosVendedores = collect();
        foreach ($vendedores as $vendedor) {
            $datosVendedores->push(
                DatoVendedor::factory()->create([
                    'idUsuario' => $vendedor->idUsuario
                ])
            );
        }

        // Datos cliente
        $datosClientes = collect();
        foreach ($clientes as $cliente) {
            $datosClientes->push(
                DatoCliente::factory()->create([
                    'idUsuario' => $cliente->idUsuario
                ])
            );
        }

        
        foreach ($datosClientes as $cliente) {
            $vendedor = $datosVendedores->random();

            Cuenta::factory()->create([
                'idCliente' => $cliente->idCliente,
                'idVendedor' => $vendedor->idVendedor
            ]);
        }

        // Terrenos
        foreach ($vendedores as $vendedor) {
            Terreno::factory(rand(1, 3))->create([
                'idUsuario' => $vendedor->idUsuario
            ]);
        }
    }
}
