<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LensaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Mengizinkan semua pengguna untuk melakukan request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'nama_lensa'  => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'material'    => 'nullable|string',
            'harga_lensa' => 'required|integer|min:0',
            'jenis'       => 'required|string|max:50',
            'stok'        => 'required|integer|min:0',
        ];
    }

    /**
     * Custom messages for validator errors.
     */
    public function messages()
    {
        return [
            'nama_lensa.required'  => 'Nama lensa wajib diisi.',
            'harga_lensa.required' => 'Harga lensa wajib diisi.',
            'harga_lensa.integer'  => 'Harga lensa harus berupa angka.',
            'harga_lensa.min'      => 'Harga lensa tidak boleh kurang dari 0.',
            'stok.required'        => 'Stok lensa wajib diisi.',
            'stok.integer'         => 'Stok lensa harus berupa angka.',
            'stok.min'             => 'Stok lensa tidak boleh kurang dari 0.',
        ];
    }
}
