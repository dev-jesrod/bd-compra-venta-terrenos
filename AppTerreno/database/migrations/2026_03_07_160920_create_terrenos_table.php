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
        Schema::create('terreno', function (Blueprint $table) {

            $table->id('idTerreno');

            $table->enum('estado', ['disponible','vendido','reservado']);

            $table->decimal('largo',8,2)->nullable();
            $table->decimal('ancho',8,2)->nullable();

            $table->string('descripcion',255)->nullable();

            $table->decimal('precio',10,2)->nullable();

            $table->unsignedBigInteger('idVendedor');

            $table->date('fechaVenta')->nullable();
            $table->date('fechaCompra')->nullable();

            $table->foreign('idVendedor')
                  ->references('idVendedor')
                  ->on('vendedor');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terreno');
    }
};