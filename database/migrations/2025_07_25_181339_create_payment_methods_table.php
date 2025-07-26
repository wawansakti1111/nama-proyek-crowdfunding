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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            // Ini adalah kolom kunci yang menghubungkan ke tabel campaigns
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->enum('type', ['bank', 'ewallet']);
            $table->string('name'); // Contoh: Bank BCA, GoPay, DANA
            $table->text('account_details'); // Contoh: 123456789 a/n Yayasan Kita
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};