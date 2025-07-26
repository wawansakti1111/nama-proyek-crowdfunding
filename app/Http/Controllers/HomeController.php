<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar kampanye.
     */
    public function index()
    {
        // Ambil kampanye yang sudah disetujui
        $campaigns = Campaign::where('status', 'approved')
                             // Hitung jumlah donasi yang statusnya 'verified' untuk setiap kampanye
                             ->withCount(['donations' => function ($query) {
                                 $query->where('status', 'verified');
                             }])
                             ->latest()
                             ->paginate(9); // Menggunakan paginate untuk membatasi data per halaman

        return view('home', compact('campaigns'));
    }

    /**
     * Menampilkan halaman detail dari sebuah kampanye.
     */
    public function show(Campaign $campaign)
    {
        if ($campaign->status !== 'approved') {
            abort(404, 'Kampanye tidak ditemukan atau belum disetujui.');
        }

        // Ambil juga jumlah donatur untuk halaman detail
        $donatorCount = $campaign->donations()->where('status', 'verified')->count();

        return view('campaigns.show', compact('campaign', 'donatorCount'));
    }
}