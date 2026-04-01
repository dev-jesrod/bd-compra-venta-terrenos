<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id('idCuenta');

            $table->foreignId('idCliente')
                ->constrained('dato_clientes', 'idCliente')
                ->onDelete('cascade');

            $table->foreignId('idVendedor')
                ->constrained('dato_vendedores', 'idVendedor')
                ->onDelete('cascade');

            $table->decimal('saldo', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};