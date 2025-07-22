<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonationController extends Controller
{
    public function create(Campaign $campaign)
    {
        if ($campaign->status !== 'approved') {
            return redirect()->route('home')->with('error', 'Kampanye tidak aktif atau tidak ditemukan.');
        }
        return view('donations.create', compact('campaign'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'campaign_id'      => 'required|exists:campaigns,id',
            'donor_name'       => 'required|string|max:255',
            'whatsapp_number'  => 'nullable|string|max:20',
            'amount'           => 'required|numeric|min:10000',
            'payment_method'   => 'required|string|in:transfer_bank,qris,ewallet',
        ]);

        $campaign = Campaign::findOrFail($request->campaign_id);

        if ($campaign->status !== 'approved') {
             return redirect()->route('campaign.show', $campaign->id)->with('error', 'Kampanye ini sudah tidak menerima donasi.');
        }

        do {
            $uniqueCode = rand(100, 500);
            $finalAmount = $request->amount + $uniqueCode;
            $isUnique = !Donation::where('unique_code', (string)$uniqueCode)
                                 ->where('created_at', '>', now()->subMinutes(10))
                                 ->exists();
        } while (!$isUnique);


        $donation = Donation::create([
            'campaign_id'     => $request->campaign_id,
            'donor_name'      => $request->donor_name,
            'whatsapp_number' => $request->whatsapp_number,
            'amount'          => $finalAmount,
            'payment_method'  => $request->payment_method,
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

        $bankDetails = [
            'transfer_bank' => [
                'bank_name' => 'Bank ABC',
                'account_number' => '1234567890',
                'account_name' => 'PT Crowdfunding Bersama'
            ],
            'qris' => [
                'instruction' => 'Scan QRIS di aplikasi pembayaran Anda.',
                'image' => 'qris_placeholder.png'
            ],
            'ewallet' => [
                'instruction' => 'Transfer ke nomor tujuan: 0812-3456-7890 (OVO/Dana/Gopay)',
                'account_name' => 'PT Crowdfunding Bersama'
            ]
        ];

        $paymentInfo = $bankDetails[$donation->payment_method] ?? null;

        return view('donations.payment', compact('donation', 'paymentInfo'));
    }

    /**
     * Menampilkan halaman konfirmasi pembayaran dan memperbarui status menjadi 'paid'.
     */
    public function confirmation(Donation $donation)
    {
        // Jika donasi masih pending, ubah statusnya menjadi 'paid' (menunggu verifikasi admin)
        if ($donation->status === 'pending') {
            $donation->update(['status' => 'paid']);
        }

        // Anda bisa tambahkan logika notifikasi ke admin di sini nanti

        return view('donations.confirmation', compact('donation'));
    }
}