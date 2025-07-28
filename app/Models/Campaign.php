<?php

namespace App\Models; // <-- INI PERUBAHANNYA

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; // Pastikan ini juga di-use
use App\Models\Donation; // Pastikan ini juga di-use
use App\Models\User; // Pastikan ini juga di-use
use App\Models\PaymentMethod; // Pastikan ini juga di-use

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
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Donation
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Relasi ke PaymentMethod
     */
    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    /**
     * Relasi ke Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}