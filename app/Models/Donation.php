<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'user_id', // Pastikan user_id ada di sini
        'donor_name',
        'whatsapp_number',
        'amount',
        'payment_method_id',
        'unique_code',
        'status',
    ];

    /**
     * Relasi ke model Campaign.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Relasi ke model PaymentMethod.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * INI YANG DITAMBAHKAN
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}