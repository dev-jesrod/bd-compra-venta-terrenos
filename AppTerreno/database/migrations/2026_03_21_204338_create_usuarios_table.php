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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('tipoUsuario', 10);
            $table->string('nombre', 45);
            $table->string('apellido1', 45);
            $table->string('apellido2', 45);
            $table->enum('sexo', ['M','F']);
            $table->date('fechaNacimiento');
            $table->string('curp', 18);
            $table->string('telefono', 10);
            $table->string('email', 80);
            $table->string('contrasena', 255);
            $table->string('foto', 255)->nullable();
            $table->boolean('estado');

            //se parados por que haria una combinacion unica de los 3 juntos
            $table->string('curp', 18)->unique();
            $table->string('telefono', 10)->unique();
            $table->string('email', 80)->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
