<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DonationController extends Controller
{
    public function create(Campaign $campaign)
    {
        if ($campaign->status !== 'approved') {
            abort(404, 'Kampanye ini tidak aktif atau tidak ditemukan.');
        }
        $paymentMethods = $campaign->paymentMethods()->get();
        if ($paymentMethods->isEmpty()) {
            abort(404, 'Metode pembayaran untuk kampanye ini belum diatur oleh admin.');
        }
        return view('donations.create', compact('campaign', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'donor_name' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
            'amount' => 'required|numeric|min:10000',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);
        $campaign = Campaign::findOrFail($request->campaign_id);
        if ($campaign->status !== 'approved') {
             return redirect()->route('home')->with('error', 'Maaf, kampanye ini sudah tidak menerima donasi.');
        }
        if (!$campaign->paymentMethods()->where('id', $request->payment_method_id)->exists()) {
            return back()->withErrors(['payment_method_id' => 'Metode pembayaran tidak valid.'])->withInput();
        }
        do {
            $uniqueCode = rand(100, 999);
            $finalAmount = $request->amount + $uniqueCode;
            $isNotUnique = Donation::where('amount', $finalAmount)->where('status', 'pending')->where('created_at', '>', now()->subDay())->exists();
        } while ($isNotUnique);
        $donation = Donation::create([
            'campaign_id'     => $request->campaign_id,
            'donor_name'      => $request->donor_name,
            'whatsapp_number' => $request->whatsapp_number,
            'amount'          => $finalAmount,
            'payment_method_id'  => $request->payment_method_id,
            'unique_code'     => (string)$uniqueCode,
            'status'          => 'pending',
        ]);
        return redirect()->route('donations.payment', $donation->id);
    }

    public function payment(Donation $donation)
    {
        if ($donation->status !== 'pending') {
            return redirect()->route('donations.confirmation', $donation->id)->with('info', 'Pembayaran sudah diproses.');
        }
        $donation->load('campaign', 'paymentMethod');
        if (!$donation->paymentMethod) {
            abort(404, 'Detail metode pembayaran tidak ditemukan.');
        }
        return view('donations.payment', [ 'donation' => $donation, 'paymentMethod' => $donation->paymentMethod ]);
    }

    /**
     * Menampilkan halaman konfirmasi "Terima Kasih".
     * Fungsi ini sekarang hanya mengubah status dan menampilkan view.
     */
    public function confirmation(Donation $donation)
    {
        // Ubah status donasi menjadi 'paid' (menunggu verifikasi)
        if ($donation->status === 'pending') {
            $donation->update(['status' => 'paid']);
        }

        // Tampilkan halaman konfirmasi yang sederhana
        return view('donations.confirmation', compact('donation'));
    }
}