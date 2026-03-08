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
       Schema::create('transaccion', function (Blueprint $table) {

         $table->id('idTransaccion');

         $table->foreignId('idCliente')
          ->nullable()
          ->constrained('clientes')
          ->references('idCliente');

          $table->foreignId('idTerreno')
          ->constrained('terreno')
          ->references('idTerreno');

         $table->date('fechaTransaccion')->nullable();

        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccion');
    }
};