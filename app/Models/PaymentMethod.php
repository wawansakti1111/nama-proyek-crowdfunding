<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi.
     */
    protected $fillable = [
        'campaign_id',
        'type',
        'name',
        'account_holder_name', // <-- KOLOM BARU DITAMBAHKAN
        'account_details',
    ];

    /**
     * Relasi ke model Campaign.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}