<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKodeRisikoRequest extends FormRequest
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
        return [
            'nama_kasatker' => 'required|string|max:255',
            'kode_risiko' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'satker' => 'required|string|max:255',
            'id_risiko.*' => 'required|string|max:255',
            'kategori_risiko.*' => 'required|string|max:255',
            'area_dampak.*' => 'required|string|max:255',
            'sasaran_strategi.*' => 'required|string|max:255',
            'indikator_kinerja.*' => 'required|string|max:255',
            'proses_tahapan.*' => 'required|string|max:255',
            'kriteria_kemungkinan.*' => 'required|string|max:255',
        ];
    }
}
