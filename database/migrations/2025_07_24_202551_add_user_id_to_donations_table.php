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
            // Menambahkan kolom user_id sebagai foreign key
            // Kolom ini bisa null karena donatur bisa saja tidak login (tamu)
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('campaign_id') // Meletakkannya setelah campaign_id
                  ->constrained('users') // Membuat relasi ke tabel 'users'
                  ->onDelete('set null'); // Jika user dihapus, user_id di donasi menjadi null
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
            // Hapus relasi (foreign key) terlebih dahulu sebelum menghapus kolom
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
