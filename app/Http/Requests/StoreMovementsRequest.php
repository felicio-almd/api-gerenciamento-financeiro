<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMovementsRequest extends FormRequest
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
            'type' => ['required', Rule::in(['in', 'out'])],
            'value' => ['required', 'numeric'],
            'category_id' => ['required', 'string', 'exists:categories,id'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
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
            'type.required' => 'O campo TIPO é obrigatório',
            'type.in' => 'O campo TIPO deve ser "in" ou "out"',
            'value.required' => 'O campo VALOR é obrigatório',
            'value.numeric' => 'O campo VALOR deve ser um número',
            'category_id.required' => 'O campo CATEGORIA é obrigatório',
            'category_id.string' => 'O identificador da CATEGORIA deve ser texto',
            'category_id.exists' => 'A CATEGORIA selecionada não existe',
            'description.required' => 'O campo DESCRIÇÃO é obrigatório',
            'description.string' => 'O campo DESCRIÇÃO deve ser um texto',
            'description.min' => 'O campo DESCRIÇÃO deve ter no mínimo 3 caracteres',
            'description.max' => 'O campo DESCRIÇÃO deve ter no máximo 255 caracteres'
        ];
    }
}