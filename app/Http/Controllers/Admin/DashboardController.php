<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Donation;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total kampanye
        $totalCampaigns = Campaign::count();

        // Menghitung donasi yang masih pending atau sudah bayar tapi belum diverifikasi
        $pendingDonations = Donation::whereIn('status', ['pending', 'paid'])->count();

        // Menghitung total dana yang sudah terverifikasi
        $totalDonations = Donation::where('status', 'verified')->sum('amount');

        return view('admin.dashboard', compact('totalCampaigns', 'pendingDonations', 'totalDonations'));
    }
}