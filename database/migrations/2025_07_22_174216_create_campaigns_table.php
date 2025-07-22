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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable(); // Path gambar kampanye
            $table->decimal('target_amount', 15, 2); // Target donasi, 15 digit total, 2 di belakang koma
            $table->decimal('collected_amount', 15, 2)->default(0); // Jumlah terkumpul
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed', 'deleted'])->default('pending'); // Status kampanye
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Admin yang membuat kampanye
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};