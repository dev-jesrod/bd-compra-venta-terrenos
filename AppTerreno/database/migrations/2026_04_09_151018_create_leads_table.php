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
        Schema::create('leads', function (Blueprint $table) {
            $table->id('idLead');
            $table->foreignId('idTerreno')->constrained('terrenos', 'idTerreno')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('email', 100);
            $table->string('telefono', 15)->nullable();
            $table->text('mensaje')->nullable();
            $table->enum('estado', ['NUEVO', 'CONTACTADO', 'DESCARTADO'])->default('NUEVO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
