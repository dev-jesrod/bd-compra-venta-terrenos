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
        Schema::create('clientes', function (Blueprint $table) {

         $table->id('idCliente'); // PRIMARY KEY + AUTO_INCREMEN

         $table->string('nombre',40);
         $table->string('apellido1',40);
         $table->string('apellido2',40)->nullable();

         $table->string('telefono',10)->nullable();

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
        Schema::dropIfExists('clientes');
    }
};
