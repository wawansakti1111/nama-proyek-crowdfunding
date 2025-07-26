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
        Schema::table('campaigns', function (Blueprint $table) {
            // Hapus kolom yang salah
            if (Schema::hasColumn('campaigns', 'payment_methods')) {
                $table->dropColumn('payment_methods');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            // Jika ingin bisa di-rollback, tambahkan lagi kolomnya di sini
            $table->text('payment_methods')->nullable();
        });
    }
};