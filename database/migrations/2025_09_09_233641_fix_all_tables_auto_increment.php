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
        $tables = [
            'abouts',
            'categories',
            'contacts',
            'coupons',
            'invoices',
            'orders',
            'page_seos',
            'site_settings',
            'sliders'
        ];

        foreach ($tables as $table) {
            try {
                // Primary key ekle (eğer yoksa)
                DB::statement("ALTER TABLE {$table} ADD PRIMARY KEY (id)");
            } catch (\Exception $e) {
                // Primary key zaten varsa hata vermez, devam et
            }

            // Auto increment ekle
            DB::statement("ALTER TABLE {$table} MODIFY id bigint UNSIGNED NOT NULL AUTO_INCREMENT");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'abouts',
            'categories',
            'contacts',
            'coupons',
            'invoices',
            'orders',
            'page_seos',
            'site_settings',
            'sliders'
        ];

        foreach ($tables as $table) {
            try {
                // Auto increment'i kaldır
                DB::statement("ALTER TABLE {$table} MODIFY id bigint UNSIGNED NOT NULL");

                // Primary key'i kaldır
                DB::statement("ALTER TABLE {$table} DROP PRIMARY KEY");
            } catch (\Exception $e) {
                // Hata olursa devam et
            }
        }
    }
};
