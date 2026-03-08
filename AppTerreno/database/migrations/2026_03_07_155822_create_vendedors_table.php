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
        Schema::create('vendedor', function (Blueprint $table) {

            $table->id('idVendedor'); // AUTO_INCREMENT + PRIMARY KEY

            $table->string('nombre',40);
            $table->string('apellido1',40);
            $table->string('apellido2',40);

            $table->string('telefono',10);
            $table->string('email',80)->unique();

            $table->string('contrasena',100);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedor');
    }
};