<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->paginate(10);
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'target_amount' => 'required|numeric|min:1000',
            'payment_methods' => 'required|array|min:1',
            'payment_methods.*.type' => 'required|in:bank,ewallet',
            'payment_methods.*.name' => 'required|string|max:255',
            'payment_methods.*.account_holder_name' => 'required|string|max:255',
            'payment_methods.*.account_details' => 'required|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaign_images', 'public');
        }

        $campaign = Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'target_amount' => $request->target_amount,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        if ($request->has('payment_methods')) {
            foreach ($request->payment_methods as $method) {
                $campaign->paymentMethods()->create([
                    'type' => $method['type'],
                    'name' => $method['name'],
                    'account_holder_name' => $method['account_holder_name'],
                    'account_details' => $method['account_details'],
                ]);
            }
        }

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil ditambahkan.');
    }

    /**
     * INI FUNGSI YANG HILANG
     * Menampilkan detail spesifik dari sebuah kampanye.
     */
    public function show(Campaign $campaign)
    {
        // Memuat relasi user dan paymentMethods agar bisa ditampilkan di view
        $campaign->load('user', 'paymentMethods');
        return view('admin.campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        $campaign->load('paymentMethods');
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'target_amount' => 'required|numeric|min:1000',
            'status' => 'required|in:pending,approved,rejected,completed',
            'payment_methods' => 'required|array|min:1',
            'payment_methods.*.type' => 'required|in:bank,ewallet',
            'payment_methods.*.name' => 'required|string|max:255',
            'payment_methods.*.account_holder_name' => 'required|string|max:255',
            'payment_methods.*.account_details' => 'required|string|max:255',
        ]);

        $imagePath = $campaign->image;
        if ($request->hasFile('image')) {
            if ($campaign->image) {
                Storage::disk('public')->delete($campaign->image);
            }
            $imagePath = $request->file('image')->store('campaign_images', 'public');
        }

        $campaign->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'target_amount' => $request->target_amount,
            'status' => $request->status,
        ]);

        $campaign->paymentMethods()->delete();
        if ($request->has('payment_methods')) {
            foreach ($request->payment_methods as $method) {
                $campaign->paymentMethods()->create([
                    'type' => $method['type'],
                    'name' => $method['name'],
                    'account_holder_name' => $method['account_holder_name'],
                    'account_details' => $method['account_details'],
                ]);
            }
        }

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil diperbarui.');
    }

    public function destroy(Campaign $campaign)
    {
        if ($campaign->image) {
            Storage::disk('public')->delete($campaign->image);
        }
        $campaign->delete();
        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil dihapus.');
    }

    public function approve(Campaign $campaign)
    {
        $campaign->update(['status' => 'approved']);
        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil disetujui.');
    }

    public function reject(Campaign $campaign)
    {
        $campaign->update(['status' => 'rejected']);
        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil ditolak.');
    }
}