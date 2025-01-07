<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Set to true to allow the request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_pasien' => 'required|string|max:255',
            'ttl' => 'required|date',
            'usia' => 'required|integer',
            'sex' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'diagnosa' => 'required|string',
            'od_sph' => 'nullable|string',
            'od_cyl' => 'nullable|string',
            'od_axis' => 'nullable|string',
            'os_sph' => 'nullable|string',
            'os_cyl' => 'nullable|string',
            'os_axis' => 'nullable|string',
            'pd' => 'nullable|string',
            'photo' => 'nullable|string',
            'tgl_pemeriksaan' => 'required|date',
            'tgl_pengambilan' => 'nullable|date',
        ];
    }
}
