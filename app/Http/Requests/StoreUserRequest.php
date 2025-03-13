<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route('user'))],
            'password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.min' => 'O campo NOME deve conter no mínimo 3 caracteres.',
            'name.max' => 'O campo NOME no máximo 255 caracteres.',
            'name.required' => 'O campo NOME é obrigatório.',
            'name.string' => 'O campo NOME deve ser um texto.',
            
            'email.required' => 'O campo E-MAIL é obrigatório.',
            'email.email' => 'O campo E-MAIL deve ser um email valido.',
            'email.unique' => 'O campo E-MAIL deve pertencer a apenas 1 usuario.',
            
            'password.required' => 'O campo SENHA é obrigatório.',
            'password.confirmed' => 'A confirmação de SENHA não corresponde.',
            'phone.required' => 'O campo TELEFONE é obrigatório.',
            
        ];
    }
}