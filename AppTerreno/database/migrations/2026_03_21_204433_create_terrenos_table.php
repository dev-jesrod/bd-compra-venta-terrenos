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
        Schema::create('terrenos', function (Blueprint $table) {
            $table->id('idTerreno');
            $table->foreignId('idUsuario')
                    ->constrained('usuarios')
                    ->references('idUsuario');
            $table->string('nombre', 100)->nullable();
            $table->enum('estado', ['DISPONIBLE','VENDIDO','RESERVADO']);
            $table->decimal('largo', 8, 2)->unsigned();
            $table->decimal('ancho', 8, 2)->unsigned();
            $table->string('descripcion', 255);
            $table->decimal('precio', 10, 2)->unsigned();
            $table->date('fechaVenta')->nullable();
            $table->date('fechaCompra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrenos');
    }
};