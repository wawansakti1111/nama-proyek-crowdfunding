<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // 1. Buat kolom user_id boleh null (karena tamu tidak punya user_id)
            $table->foreignId('user_id')->nullable()->change();

            // 2. Tambahkan kolom untuk menyimpan nama tamu
            $table->string('guest_name')->nullable()->after('campaign_id');
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable(false)->change();
            $table->dropColumn('guest_name');
        });
    }
};