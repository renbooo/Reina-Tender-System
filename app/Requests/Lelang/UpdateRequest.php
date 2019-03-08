<?php

namespace App\Http\Requests\Lelang;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
          'namalelang' => 'required',
          'deskripsi' => 'required',
          'tanggaltutup' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'namalelang.required' => 'Nama Tidak Boleh Kosong.',
          'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong.',
          'tanggaltutup.required' => 'Tanggal Tidak Boleh Kosong.',
        ];
    }
}
