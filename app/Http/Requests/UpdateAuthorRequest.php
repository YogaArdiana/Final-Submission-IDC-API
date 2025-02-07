<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAuthorRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'biography' => 'sometimes|string',
        ];
    }
    public function messages()
    {
        return [
            'name.string' => 'Nama Penulis harus berupa string',
            'name.max' => 'Nama Penulis maksimal 255 karakter',
            'biography.string' => 'Biografi Penulis harus berupa string',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'code' => 422,
            'message'   => 'Validasi Error',
            'errors'      => $validator->errors()
        ], 422));
    }
}
