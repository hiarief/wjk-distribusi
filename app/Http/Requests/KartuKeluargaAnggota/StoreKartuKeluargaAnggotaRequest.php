<?php

namespace App\Http\Requests\KartuKeluargaAnggota;

use Illuminate\Foundation\Http\FormRequest;

class StoreKartuKeluargaAnggotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'no_nik' => 'required|unique:App\Models\Tabel\KartuKeluargaAnggota,no_nik|numeric|max:16',
            'nama' => 'required|alpha',
        ];
    }

    public function messages()
    {
        return [
            'no_nik.unique' => 'No nik sudah ada, cek kembali',
            'no_nik.max' => 'No nik maksimal berjumlah 16',
            'nama.alpha' => 'Nama harus berupa huruf',
        ];
    }
}