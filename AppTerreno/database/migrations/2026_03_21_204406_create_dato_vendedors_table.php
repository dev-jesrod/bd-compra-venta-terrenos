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
        Schema::create('dato_vendedors', function (Blueprint $table) {
            $table->id('idVendedor');
            $table->foreignId('idUsario')
                    ->constrained('usuarios')
                    ->references('idUsuario');
            $table->string('rfc', 13)->unique();
            $table->decimal('utilidad', 4, 2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dato_vendedors');
    }
};
