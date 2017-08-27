<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
          'namaadmin' => 'Required',
          'alamatadmin' => 'Required',
          'tanggallahir' => 'Required',
          'kotalahir' => 'Required',
          'jeniskelamin' => 'Required'
        ];
    }

    public function messages()
    {
        return [
          'namaadmin.required' => 'Nama Tidak Boleh Kosong.',
          'alamatadmin.required' => 'Alamat Tidak Boleh Kosong.',
          'tanggallahir.required' => 'Kota Tidak Boleh Kosong',
          'kotalahir.required' => 'NPWP Tidak Boleh Kosong',
          'jeniskelamin.required' => 'Nomor Telepon Tidak Boleh Kosong'
        ];
    }
}
