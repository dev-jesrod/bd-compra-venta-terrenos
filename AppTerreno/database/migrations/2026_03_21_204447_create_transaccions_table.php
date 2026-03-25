<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id('idTransaccion');
            $table->foreignId('idUsuario')->constrained();
            $table->foreignId('idTerreno')->constrained()->unique();
            $table->foreignId('idCuenta')->constrained();
            $table->enum('metodoPago', ['EFECTIVO','TRANSFERENCIA']);
            $table->enum('estadoPago', ['PENDIENTE','COMPLETADO']);
            $table->decimal('monto', 10, 2);
            $table->date('fechaTransaccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
};
