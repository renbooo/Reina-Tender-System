<?php

namespace App\Http\Requests\Penawaran;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
          'idlelang' => 'required',
          'namalelang' => 'required',
          'id' => 'required',
          'username' => 'required',
          'nilaitawar' => 'required',
          'uploadtawaran' => 'required|file|mimes:zip,rar|max:2048',
        ];
    }

    public function messages()
    {
        return [
          'idlelang' => 'Id Lelang tidak terdefinisi',
          'namalelang' => 'Nama lelang tidak terdefinisi',
          'id' => 'Id user tidak terdefinisi',
          'username' => 'Username tidak terdefinisi',
          'nilaitawar' => 'Nilai tawaran harus diisi',
          'uploadtawaran' => 'File harus di upload',
        ];
    }
}
