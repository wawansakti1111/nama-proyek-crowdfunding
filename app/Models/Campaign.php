<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    // Properti yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'title',
        'description',
        'image',
        'target_amount',
        'collected_amount',
        'status',
        'user_id', // ID admin yang membuat kampanye
    ];

    // Casting tipe data
    protected $casts = [
        'target_amount' => 'decimal:2',
        'collected_amount' => 'decimal:2',
    ];

    // Relasi: Sebuah kampanye memiliki banyak donasi
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    // Relasi: Sebuah kampanye dimiliki oleh satu user (admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Hitung persentase progres donasi.
     *
     * @return float
     */
    public function getProgressPercentageAttribute()
    {
        // Pastikan target_amount adalah numerik dan tidak nol
        if (!is_numeric($this->target_amount) || $this->target_amount == 0) {
            return 0;
        }
        return round(($this->collected_amount / $this->target_amount) * 100, 2);
    }
}