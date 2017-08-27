<?php

namespace App\Http\Requests\Komentar;

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
          'id' => 'required',
          'username' => 'required',
          'pertanyaan' => 'required',
          // 'jawaban' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'id' => 'Id perusahaan tidak terdefinisi',
          'username' => 'Nama perusahaan tidak terdefinisi',
          'pertanyaan' => 'Pertanyaan tidak boleh kosong',
          // 'jawaban' => 'Jawaban tidak boleh kosong',
        ];
    }
}
