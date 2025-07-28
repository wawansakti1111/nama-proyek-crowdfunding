<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest; // <-- Gunakan Form Request yang sudah diupdate

class CommentController extends Controller
{
    /**
     * Simpan komentar baru ke database.
     * Route: POST /comments/{campaign}
     * Name: comments.store
     */
    public function store(StoreCommentRequest $request, Campaign $campaign)
    {
        // Validasi akan ditangani otomatis oleh StoreCommentRequest.
        // Jika gagal, response error 422 dengan pesan JSON akan dikirim.

        $comment = new Comment();
        $comment->campaign_id = $campaign->id;
        $comment->body = $request->body; // <-- Gunakan 'body' dari request

        $authorName = '';
        $authorInitial = '';

        if (Auth::check()) {
            // Jika user login
            $user = Auth::user();
            $comment->user_id = $user->id;
            // Kolom guest_name bisa kita isi juga untuk konsistensi data
            $comment->guest_name = $user->name; 
            $authorName = $user->name;
        } else {
            // Jika user adalah guest
            $comment->guest_name = $request->guest_name; // <-- Gunakan 'guest_name'
            $authorName = $request->guest_name;
        }

        $comment->save();

        // Siapkan data untuk response JSON sesuai yang dibutuhkan frontend
        $newCommentData = [
            'author_name' => $authorName,
            // Ambil huruf pertama dari nama untuk avatar
            'author_initial' => strtoupper(substr($authorName, 0, 1)),
            'body' => $comment->body,
            'created_at' => $comment->created_at->diffForHumans(),
        ];

        // Kirim response sukses
        // Laravel otomatis akan memberikan status 201 (Created) atau 200 (OK)
        return response()->json([
            'message' => 'Komentar berhasil dikirim!', // Pesan untuk notifikasi
            'comment' => $newCommentData
        ]);
    }
}