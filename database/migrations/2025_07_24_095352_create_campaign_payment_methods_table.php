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
        Schema::create('campaign_payment_methods', function (Blueprint $table) {
            $table->id();
            // Foreign key ke tabel 'campaigns'
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->enum('type', ['bank_transfer', 'e_wallet']); // Tipe metode pembayaran (misal: 'bank_transfer', 'e_wallet')
            $table->string('method_name'); // Nama bank (misal: 'BCA', 'Mandiri'), atau nama e-wallet (misal: 'GoPay', 'Dana')
            $table->string('account_number'); // Nomor rekening bank atau nomor telepon e-wallet
            $table->string('account_holder_name'); // Nama pemilik rekening/e-wallet
            $table->boolean('is_active')->default(true); // Status aktif/non-aktif metode pembayaran
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_payment_methods');
    }
};