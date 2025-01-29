<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBookRequest extends FormRequest
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
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'author_id' => 'sometimes|exists:authors,id',
            'category_id' => 'sometimes|exists:categories,id',
        ];
        
    }
    public function messages()
    {
        return [
            'title.sometimes' => 'Judul buku opsional, jika diisi harus berupa teks dan tidak lebih dari 255 karakter.',
            'title.string' => 'Judul buku harus berupa teks.',
            'title.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
            'description.sometimes' => 'Deskripsi opsional, jika diisi harus berupa teks.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'author_id.sometimes' => 'Penulis opsional, jika dipilih harus valid.',
            'author_id.exists' => 'Penulis yang dipilih tidak valid.',
            'category_id.sometimes' => 'Kategori opsional, jika dipilih harus valid.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validasi Error',
            'errors'      => $validator->errors()
        ], 422));
    }
}
