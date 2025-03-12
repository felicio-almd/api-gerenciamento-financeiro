<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMovementsRequest extends FormRequest
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
            'type' => ['sometimes', Rule::in(['in', 'out'])],
            'value' => ['sometimes', 'numeric'],
            'category_id' => ['sometimes', 'string', 'exists:categories,id'],
            'description' => ['sometimes', 'string', 'min:3', 'max:255'],
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.in' => 'O campo TIPO deve ser "in" ou "out"',
            'value.numeric' => 'O campo VALOR deve ser um número',
            'category_id.string' => 'O identificador da CATEGORIA deve ser texto',
            'category_id.exists' => 'A CATEGORIA selecionada não existe',
            'description.string' => 'O campo DESCRIÇÃO deve ser um texto',
            'description.min' => 'O campo DESCRIÇÃO deve ter no mínimo 3 caracteres',
            'description.max' => 'O campo DESCRIÇÃO deve ter no máximo 255 caracteres'
        ];
    }
}