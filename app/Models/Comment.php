<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * INI ADALAH KUNCI PERBAIKANNYA
     * Tentukan kolom mana saja yang boleh diisi secara massal.
     */
    protected $fillable = [
        'user_id',
        'campaign_id',
        'guest_name',
        'body',
    ];

    /**
     * Relasi ke model User (komentar bisa dimiliki oleh user).
     */
    public function user()
    {
        // Relasi ini dibuat nullable di database, jadi aman.
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Campaign.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}