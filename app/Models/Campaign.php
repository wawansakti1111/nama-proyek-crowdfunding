<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'target_amount',
        'collected_amount',
        'status',
        'user_id',
    ];

    /**
     * Relasi: Sebuah kampanye dimiliki oleh satu user (admin).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Sebuah kampanye memiliki banyak donasi.
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Relasi BARU: Sebuah kampanye memiliki banyak metode pembayaran.
     * Ini adalah kunci agar bisa menyimpan dan mengambil data metode pembayaran.
     */
    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }
}