<?php

namespace Database\Seeders;

use App\Models\DatoCliente;
use App\Models\DatoVendedor;
use App\Models\Cuenta;
use App\Models\Terreno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        Usuario::factory(20)->create();
        DatoCliente::factory(20)->create();
        DatoVendedor::factory(10)->create();
        Cuenta::factory(15)->create();
        Terreno::factory(20)->create();
    }
}
