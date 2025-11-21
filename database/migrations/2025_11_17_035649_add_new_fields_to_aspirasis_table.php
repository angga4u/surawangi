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
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->string('telepon')->nullable()->after('email');
            $table->string('kategori')->after('telepon');
            $table->string('tujuan')->after('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->dropColumn(['telepon', 'kategori', 'tujuan']);
        });
    }
};
