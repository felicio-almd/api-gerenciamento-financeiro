<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriesRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'min:3', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'O campo NOME deve ser uma palavra',
            'name.min' => 'O campo NOME deve ter no mínimo 3 letras',
            'name.max' => 'O campo NOME deve ter no máximo 255 letras'
        ];
    }
}
