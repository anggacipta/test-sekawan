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
        Schema::table('persetujuans', function (Blueprint $table) {
            $table->boolean('admin_menanggapi');
            $table->boolean('atasan_menanggapi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('persetujuans', function (Blueprint $table) {
            $table->dropColumn('admin_menanggapi');
            $table->dropColumn('atasan_menanggapi');
        });
    }
};
