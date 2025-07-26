<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            // Menambahkan kolom untuk menyimpan nama pemilik rekening
            $table->string('account_holder_name')->nullable()->after('name');
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropColumn('account_holder_name');
        });
    }
};