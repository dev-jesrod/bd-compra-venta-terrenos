<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('land_id');

            $table->decimal('amount',12,2);
            $table->string('status')->default('pending');

            $table->timestamps();

            $table->foreign('user_id')->references('idUsuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('land_id')->references('idTerreno')->on('terrenos')->onDelete('cascade');

            $table->engine = 'InnoDB';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};