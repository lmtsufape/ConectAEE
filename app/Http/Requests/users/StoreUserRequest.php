<?php

namespace App\Http\Requests\users;

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
            'nome' => ['required','string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'cpf' => ['required', 'unique:users,cpf'],
            'matricula' => ['required', 'unique:users,matricula'],
            'especialidade' => ['required'],
            'telefone' => ['required', 'unique:users,telefone'],
            'password' => ['required', 'min:8', 'confirmed'],

        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'password.confirmed' => 'As senhas não coincidem',
        ];
    }
}
