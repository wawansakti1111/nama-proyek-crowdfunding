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
        Schema::table('donations', function (Blueprint $table) {
            // Hapus kolom 'payment_method' yang lama jika ada
            if (Schema::hasColumn('donations', 'payment_method')) {
                $table->dropColumn('payment_method');
            }

            // Tambahkan kolom 'payment_method_id' yang benar
            // Pastikan kolom ini belum ada sebelum menambahkannya
            if (!Schema::hasColumn('donations', 'payment_method_id')) {
                $table->foreignId('payment_method_id')
                      ->nullable()
                      ->after('amount') // Letakkan setelah kolom amount
                      ->constrained('payment_methods') // Hubungkan ke tabel payment_methods
                      ->onDelete('set null'); // Jika metode pembayaran dihapus, kolom ini jadi null
            }
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            // Jika ingin bisa di-rollback, kembalikan seperti semula
            if (Schema::hasColumn('donations', 'payment_method_id')) {
                $table->dropForeign(['payment_method_id']);
                $table->dropColumn('payment_method_id');
            }

            if (!Schema::hasColumn('donations', 'payment_method')) {
                $table->string('payment_method')->nullable()->after('amount');
            }
        });
    }
};