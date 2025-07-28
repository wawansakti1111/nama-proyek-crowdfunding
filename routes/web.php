<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CampaignController as AdminCampaignController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute untuk Halaman Utama (Homepage)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk menampilkan detail kampanye kepada publik
Route::get('/campaigns/{campaign}', [HomeController::class, 'show'])->name('campaigns.show');

// Rute untuk proses donasi oleh pengguna
Route::get('/donations/create/{campaign}', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donations/{donation}', [DonationController::class, 'show'])->name('donations.show');
Route::get('/donations/{donation}/confirmation', [DonationController::class, 'confirmation'])->name('donations.confirmation');
Route::get('/donations/{donation}/payment', [DonationController::class, 'payment'])->name('donations.payment');

// Rute untuk mengirim komentar (tidak memerlukan login)
Route::post('/campaigns/{campaign}/comments', [CommentController::class, 'store'])->name('comments.store');

// Rute untuk Dashboard Pengguna yang sudah Login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Grup Admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Manajemen Kampanye (CRUD) oleh Admin
    Route::resource('campaigns', AdminCampaignController::class);
    Route::post('campaigns/{campaign}/approve', [AdminCampaignController::class, 'approve'])->name('campaigns.approve');
    // ======================================================
    // == RUTE BARU DITAMBAHKAN DI SINI UNTUK REJECT ==
    // ======================================================
    Route::post('campaigns/{campaign}/reject', [AdminCampaignController::class, 'reject'])->name('campaigns.reject');

    // Manajemen Donasi oleh Admin
    Route::get('donations', [AdminDonationController::class, 'index'])->name('donations.index');
    
    // =================================================================================
    // == PERBAIKAN: Mengubah {id} menjadi {donation} agar cocok dengan controller ==
    // =================================================================================
    Route::post('donations/verify/{donation}', [AdminDonationController::class, 'verify'])->name('donations.verify');
    Route::post('donations/cancel/{donation}', [AdminDonationController::class, 'cancel'])->name('donations.cancel');

    Route::get('donations/history', [AdminDonationController::class, 'history'])->name('donations.history');
});

// Memuat rute-rute otentikasi
require __DIR__.'/auth.php';