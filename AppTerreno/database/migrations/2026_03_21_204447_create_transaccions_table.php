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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id('idTransaccion');

            $table->foreignId('idUsuario')
                ->constrained('usuarios')
                ->references('idUsuario')
                ->onDelete('cascade');

            $table->foreignId('idTerreno')
                ->unique()
                ->constrained('terrenos')
                ->references('idTerreno')
                ->onDelete('cascade');

            $table->foreignId('idCuenta')
                ->constrained('cuentas')
                ->references('idCuenta')
                ->onDelete('cascade');

            $table->enum('metodoPago', ['EFECTIVO','TRANSFERENCIA']);
            $table->enum('estadoPago', ['PENDIENTE','COMPLETADO']);

            $table->decimal('monto', 10, 2)->unsigned();
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
