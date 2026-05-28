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
        if (Schema::hasTable('documentos') && !Schema::hasColumn('documentos', 'motivo_rechazo')) {
            Schema::table('documentos', function (Blueprint $table) {
                $table->string('motivo_rechazo', 255)->nullable()->after('estado');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('documentos') && Schema::hasColumn('documentos', 'motivo_rechazo')) {
            Schema::table('documentos', function (Blueprint $table) {
                $table->dropColumn('motivo_rechazo');
            });
        }
    }
};
