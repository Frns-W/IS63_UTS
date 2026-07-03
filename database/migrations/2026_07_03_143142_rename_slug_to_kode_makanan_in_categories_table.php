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
        Schema::table('categories', function (Blueprint $table) {
            // Mengubah nama kolom dari slug menjadi kode_makanan
            $table->renameColumn('slug', 'kode_makanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Mengembalikan nama jika migration di-rollback
            $table->renameColumn('kode_makanan', 'slug');
        });
    }
};