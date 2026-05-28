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
        Schema::table('terrenos', function (Blueprint $table) {
            $table->enum('estado_verificacion', ['PENDIENTE', 'APROBADO', 'RECHAZADO'])->default('PENDIENTE')->after('estado');
            $table->text('motivo_rechazo')->nullable()->after('estado_verificacion');
        });
    }

    public function down(): void
    {
        Schema::table('terrenos', function (Blueprint $table) {
            $table->dropColumn(['estado_verificacion', 'motivo_rechazo']);
        });
    }
};
