<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Sadece auto increment ekle (primary key zaten var)
        DB::statement('ALTER TABLE image_media MODIFY id bigint UNSIGNED NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Auto increment'i kaldır
        DB::statement('ALTER TABLE image_media MODIFY id bigint UNSIGNED NOT NULL');
    }
};
