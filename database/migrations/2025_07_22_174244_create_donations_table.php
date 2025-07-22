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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade'); // Relasi ke kampanye
            $table->string('donor_name');
            $table->string('whatsapp_number')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('payment_method')->nullable(); // Contoh: 'transfer_bank', 'gopay', dll.
            $table->string('unique_code')->unique(); // Kode unik pembayaran
            $table->enum('status', ['pending', 'paid', 'verified', 'cancelled'])->default('pending'); // Status pembayaran
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};