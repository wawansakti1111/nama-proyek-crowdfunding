<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar kampanye.
     */
    public function index(Request $request)
    {
        // Start a query builder
        $query = Campaign::where('status', 'approved');

        // If there is a search query, filter the results
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        // Get the paginated results
        $campaigns = $query->latest()->paginate(9);

        // Kirim data kampanye ke view 'home'
        return view('home', compact('campaigns'));
    }

    /**
     * Menampilkan halaman detail untuk satu kampanye.
     */
    public function show(Campaign $campaign)
    {
        if ($campaign->status !== 'approved') {
            abort(404, 'Kampanye tidak ditemukan atau belum disetujui.');
        }

        $donors = $campaign->donations()->where('status', 'verified')->latest()->get();
        $comments = $campaign->comments()->latest()->get();

        return view('campaigns.show', compact('campaign', 'donors', 'comments'));
    }
}
