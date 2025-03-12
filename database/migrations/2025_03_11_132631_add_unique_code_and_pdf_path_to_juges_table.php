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
        Schema::table('juges', function (Blueprint $table) {
            $table->string('unique_code')->unique()->nullable()->after('photo_profil');
            $table->string('pdf_path')->nullable()->after('unique_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('juges', function (Blueprint $table) {
            $table->dropColumn(['unique_code', 'pdf_path']);
        });
    }
};
