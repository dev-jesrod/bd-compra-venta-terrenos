<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('terrenos', function (Blueprint $table) {
            $table->decimal('superficie', 10, 2)->unsigned()->nullable()->after('precio');
            $table->enum('zonificacion', ['Residencial', 'Comercial', 'Industrial', 'Agricola', 'Mixta'])->nullable()->after('superficie');
            $table->enum('pendiente', ['Plana', 'Semi-plana', 'Con pendiente'])->nullable()->after('zonificacion');
            $table->json('imagenes')->nullable()->after('pendiente');
        });
    }

    public function down(): void
    {
        Schema::table('terrenos', function (Blueprint $table) {
            $table->dropColumn(['superficie', 'zonificacion', 'pendiente', 'imagenes']);
        });
    }
};
