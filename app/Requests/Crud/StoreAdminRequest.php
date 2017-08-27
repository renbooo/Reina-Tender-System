<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
          'jeniskelamin' => 'Required',
        ];
    }

    public function messages()
    {
        return [
          'namaadmin.required' => 'Nama Tidak Boleh Kosong.',
          'alamatadmin.required' => 'Alamat Tidak Boleh Kosong.',
          'tanggallahir.required' => 'Tanggal Lahir Tidak Boleh Kosong',
          'kotalahir.required' => 'Kota lahir Tidak Boleh Kosong',
          'jeniskelamin.required' => 'Jenis Kelamin Tidak Boleh Kosong',
        ];
    }
}
