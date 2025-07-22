<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\CampaignController as AdminCampaignController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute Publik (pengguna non-login)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/campaigns/{campaign}', [HomeController::class, 'show'])->name('campaign.show');
Route::get('/campaigns/{campaign}/donate', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donations/{donation}/payment', [DonationController::class, 'payment'])->name('donations.payment');
Route::get('/donations/{donation}/confirmation', [DonationController::class, 'confirmation'])->name('donations.confirmation');



// Rute untuk Admin (membutuhkan login dan verifikasi email)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Rute-rute untuk Manajemen Profil Admin
    // Ini akan menjadi admin.profile.edit, admin.profile.update, admin.profile.destroy
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute-rute untuk Manajemen Kampanye
    Route::resource('campaigns', AdminCampaignController::class);
    Route::post('campaigns/{campaign}/approve', [AdminCampaignController::class, 'approve'])->name('campaigns.approve');
    Route::post('campaigns/{campaign}/reject', [AdminCampaignController::class, 'reject'])->name('campaigns.reject');

    // Rute-rute untuk Verifikasi Pembayaran
    Route::get('donations', [AdminDonationController::class, 'index'])->name('donations.index');
    Route::post('donations/{donation}/verify', [AdminDonationController::class, 'verify'])->name('donations.verify');
    Route::post('donations/{donation}/cancel', [AdminDonationController::class, 'cancel'])->name('donations.cancel');
    Route::get('donations/history', [AdminDonationController::class, 'history'])->name('donations.history');
});


// Rute Autentikasi Bawaan Laravel Breeze
// PENTING: Pastikan Anda telah MENGHAPUS rute profil dari routes/auth.php
// agar tidak ada duplikasi dengan rute profil di grup admin di atas.
require __DIR__.'/auth.php';