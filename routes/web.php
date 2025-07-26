<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CampaignController as AdminCampaignController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\ProfileController;

// RUTE PUBLIK
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/campaigns/{campaign}', [HomeController::class, 'show'])->name('campaign.show');

// RUTE DONASI
Route::get('/campaigns/{campaign}/donate', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donations/{donation}/payment', [DonationController::class, 'payment'])->name('donations.payment');

// == PERUBAHAN DI SINI: Mengubah GET menjadi POST untuk konfirmasi ==
Route::get('/donations/{donation}/confirmation', [DonationController::class, 'confirmation'])->name('donations.confirmation');


// RUTE AUTENTIKASI DARI BREEZE
require __DIR__.'/auth.php';


// RUTE UNTUK USER YANG SUDAH LOGIN
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    })->name('dashboard');

    // Profil untuk semua user yang login
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// == RUTE KHUSUS ADMIN ==
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Manajemen Kampanye
    Route::resource('campaigns', AdminCampaignController::class);
    Route::post('campaigns/{campaign}/approve', [AdminCampaignController::class, 'approve'])->name('campaigns.approve');
    Route::post('campaigns/{campaign}/reject', [AdminCampaignController::class, 'reject'])->name('campaigns.reject');
    // Manajemen Donasi
    Route::get('donations', [AdminDonationController::class, 'index'])->name('donations.index');
    Route::get('donations/history', [AdminDonationController::class, 'history'])->name('donations.history');
    Route::post('donations/{donation}/verify', [AdminDonationController::class, 'verify'])->name('donations.verify');
    Route::post('donations/{donation}/cancel', [AdminDonationController::class, 'cancel'])->name('donations.cancel');
});