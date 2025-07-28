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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            // *** INI ADALAH PERUBAHAN KRUSIAL: 'comment' DIUBAH MENJADI 'body' ***
            'body' => 'required|string|max:1000', 
        ];

        if (Auth::guest()) {
            // *** INI ADALAH PERUBAHAN KRUSIAL: 'name' DIUBAH MENJADI 'guest_name' ***
            $rules['guest_name'] = 'required|string|max:255'; 

        }

        return $rules;
    }

    /**
     * Pesan error kustom.
     */
    public function messages(): array
    {
        return [
            // *** PERBAIKAN PESAN ERROR SESUAI NAMA FIELD BARU ***
            'guest_name.required' => 'Nama wajib diisi.',

            'body.required' => 'Komentar tidak boleh kosong.',
            'body.max' => 'Komentar terlalu panjang, maksimal 1000 karakter.',
        ];
    }
}