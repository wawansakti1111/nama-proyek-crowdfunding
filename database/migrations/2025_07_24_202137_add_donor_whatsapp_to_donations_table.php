<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            // Menambahkan kolom untuk nomor WhatsApp donatur
            // Diletakkan setelah kolom 'donor_name' dan bisa NULL (tidak wajib diisi)
            $table->string('donor_whatsapp')->nullable()->after('donor_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('donor_whatsapp');
        });
    }
};