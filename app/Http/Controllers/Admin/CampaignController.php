<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'target_amount' => 'required|numeric|min:1000',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaign_images', 'public');
        }

        Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'target_amount' => $request->target_amount,
            'collected_amount' => 0,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.campaigns.index')->with('success', 'Kampanye berhasil ditambahkan dan menunggu persetujuan.');
    }

    public function show(Campaign $campaign)
    {
        return view('admin.campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'target_amount' => 'required|numeric|min:1000',
            'status' => 'required|in:pending,approved,rejected,completed,deleted',
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