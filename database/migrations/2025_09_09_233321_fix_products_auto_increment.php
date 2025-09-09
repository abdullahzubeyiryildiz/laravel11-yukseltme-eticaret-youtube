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
        // Önce primary key ekle
        DB::statement('ALTER TABLE products ADD PRIMARY KEY (id)');

        // Sonra auto increment yap
        DB::statement('ALTER TABLE products MODIFY id bigint UNSIGNED NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Auto increment'i kaldır
        DB::statement('ALTER TABLE products MODIFY id bigint UNSIGNED NOT NULL');

        // Primary key'i kaldır
        DB::statement('ALTER TABLE products DROP PRIMARY KEY');
    }
};
