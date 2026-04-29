<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /** Tentukan apakah user boleh melakukan request ini */
    public function authorize(): bool
    {
        return true; // true = semua user boleh
    }

    /** Aturan validasi */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|max:100',
            'isbn'        => 'required|string|unique:books,isbn|max:20',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
        ];
    }

    /** Pesan error kustom dalam bahasa Indonesia */
    public function messages(): array
    {
        return [
            'title.required'  => 'Judul buku wajib diisi.',
            'title.min'       => 'Judul minimal :min karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'isbn.required'   => 'ISBN wajib diisi.',
            'isbn.unique'     => 'ISBN :input sudah terdaftar di sistem.',
            'price.required'  => 'Harga wajib diisi.',
            'price.numeric'   => 'Harga harus berupa angka.',
            'price.min'       => 'Harga tidak boleh negatif.',
            'stock.required'  => 'Stok wajib diisi.',
            'stock.integer'   => 'Stok harus berupa bilangan bulat.',
        ];
    }

    /** Nama atribut yang ramah di pesan error */
    public function attributes(): array
    {
        return [
            'title'  => 'Judul',
            'author' => 'Penulis',
            'isbn'   => 'ISBN',
            'price'  => 'Harga',
            'stock'  => 'Stok',
        ];
    }
}