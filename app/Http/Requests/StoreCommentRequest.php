<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Izinkan semua orang (login maupun tidak) untuk membuat request ini
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Aturan dasar
        $rules = [
            'comment' => 'required|string|max:1000',
        ];

        // Jika pengguna adalah guest (tidak login), tambahkan aturan untuk nama dan email
        if (Auth::guest()) {
            $rules['name'] = 'required|string|max:255';
            $rules['email'] = 'required|email|max:255';
        }

        return $rules;
    }

    /**
     * Pesan error kustom (opsional, tapi bagus untuk UX)
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'comment.required' => 'Komentar tidak boleh kosong.',
        ];
    }
}