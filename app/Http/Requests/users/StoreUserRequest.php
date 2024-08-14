<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'nome' => 'required','string', 'max:255',
            'email' => 'required', 'email', 'unique:users',
            'cpf' => 'required', 'unique:users',
            'matricula' => 'required',
            'telefone' => 'required',
            'password' => 'required', 'string', 'min:6', 'confirmed',

        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'obrigatorio',
        ];
    }
}
