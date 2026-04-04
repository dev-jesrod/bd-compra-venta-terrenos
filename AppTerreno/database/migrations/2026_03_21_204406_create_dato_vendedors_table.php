<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dato_vendedores', function (Blueprint $table) {
            $table->id('idVendedor');

            $table->foreignId('idUsuario')
                ->constrained('usuarios')
                ->references('idUsuario');

            $table->string('rfc', 13)->unique();
            $table->decimal('utilidad', 10, 2)->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dato_vendedores');
    }
};