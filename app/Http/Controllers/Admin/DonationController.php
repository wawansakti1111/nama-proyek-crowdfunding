<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::where('status', 'paid')
                             ->with('campaign')
                             ->latest()
                             ->paginate(10);
        return view('admin.donations.index', compact('donations'));
    }

    public function verify(Donation $donation)
    {
        if ($donation->status === 'paid') {
            $donation->update(['status' => 'verified']);

            $donationAmountWithoutUniqueCode = $donation->amount - $donation->unique_code;

            $campaign = $donation->campaign;
            if ($campaign) {
                $campaign->increment('collected_amount', $donationAmountWithoutUniqueCode);
            }

            return redirect()->route('admin.donations.index')->with('success', 'Pembayaran berhasil diverifikasi dan ditambahkan ke kampanye.');
        }

        return redirect()->route('admin.donations.index')->with('error', 'Donasi tidak dalam status untuk diverifikasi.');
    }

    public function cancel(Donation $donation)
    {
        if ($donation->status === 'paid' || $donation->status === 'pending') {
            $donation->update(['status' => 'cancelled']);
            return redirect()->route('admin.donations.index')->with('success', 'Donasi berhasil dibatalkan.');
        }
        return redirect()->route('admin.donations.index')->with('error', 'Donasi tidak dapat dibatalkan.');
    }

    public function history()
    {
        $donations = Donation::with('campaign')
                             ->orderByDesc('created_at')
                             ->paginate(20);
        return view('admin.donations.history', compact('donations'));
    }
}