<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Campaign; // Pastikan model Campaign di-import
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // <-- PENTING: Tambahkan ini

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Campaign $campaign)
    {
        // 1. Validasi input secara manual agar bisa mengirim respons JSON
        $validator = Validator::make($request->all(), [
            // guest_name wajib diisi HANYA JIKA pengguna tidak login
            'guest_name' => 'required_if:user_id,null|string|max:255',
            'body'       => 'required|string|min:5|max:1000',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            // Jika permintaan datang dari AJAX, kirim error sebagai JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false, 
                    'message' => $validator->errors()->first()
                ], 422); // 422 Unprocessable Entity
            }
            // Jika permintaan biasa, kembali ke halaman sebelumnya dengan error
            return back()->withErrors($validator)->withInput();
        }

        // 2. Simpan komentar ke database
        $comment = Comment::create([
            // Jika user login, ambil ID-nya. Jika tamu, simpan sebagai null.
            'user_id'     => Auth::id(),

            // Ambil ID dari campaign yang sedang dibuka
            'campaign_id' => $campaign->id,

            // Jika user login, guest_name diisi null.
            // Jika tamu, simpan nama dari input form.
            'guest_name'  => Auth::check() ? null : $request->guest_name,
            
            'body'        => $request->body,
        ]);

        // 3. Kirim respons berdasarkan jenis permintaan
        
        // Jika permintaan datang dari AJAX, kirim data komentar baru sebagai JSON
        if ($request->expectsJson()) {
            $authorName = $comment->user->name ?? $comment->guest_name;
            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil dikirim!',
                'comment' => [
                    // Gunakan htmlspecialchars untuk keamanan
                    'author_name'    => htmlspecialchars($authorName),
                    'author_initial' => strtoupper(substr($authorName, 0, 1)),
                    'body'           => htmlspecialchars($comment->body),
                ]
            ], 201); // 201 Created
        }

        // Jika permintaan biasa, kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Komentar Anda berhasil dikirim!');
    }
}
