<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'donor_name',
        'whatsapp_number',
        'amount',
        'payment_method',
        'unique_code',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Relasi: Sebuah donasi termasuk ke dalam satu kampanye
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}