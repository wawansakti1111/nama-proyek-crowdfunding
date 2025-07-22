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
        $campaigns = Campaign::where('status', 'approved')
                             ->orderByDesc('collected_amount')
                             ->latest()
                             ->get();

        return view('home', compact('campaigns'));
    }

    /**
     * Menampilkan halaman detail kampanye.
     */
    public function show(Campaign $campaign) // Laravel secara otomatis mengikat ID ke model Campaign
    {
        // Pastikan kampanye yang diakses adalah yang berstatus 'approved'
        // atau bisa juga menampilkan pesan error jika tidak ditemukan
        if ($campaign->status !== 'approved') {
            abort(404); // Tampilkan halaman 404 Not Found jika kampanye tidak aktif/disetujui
        }

        return view('campaigns.show', compact('campaign'));
    }
}