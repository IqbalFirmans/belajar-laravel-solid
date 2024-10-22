<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required|min:3',
            'image' => ['mimes:jpg,png,jpeg','max:5000', $this->method() == 'PUT' ? 'nullable' : 'required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama Makanan harus diisi!',
            'image.mimes' => 'File harus berupa jpg,png,jpeg'
        ];
    }
}
