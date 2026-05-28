<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terreno_visitas', function (Blueprint $table) {
            $table->id('idVisita');
            $table->foreignId('idTerreno')->constrained('terrenos', 'idTerreno')->onDelete('cascade');
            $table->foreignId('idUsuario')->nullable()->constrained('usuarios', 'idUsuario')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terreno_visitas');
    }
};
