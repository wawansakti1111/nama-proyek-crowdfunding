<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'type',
        'method_name',
        'account_number',
        'account_holder_name',
        'is_active',
    ];

    /**
     * Dapatkan kampanye yang memiliki metode pembayaran ini.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}