<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $user_id = $this->route('user_id');

        return [
            'nome' => ['required','string', 'max:255'],
            'email' => ['required','email','unique:users,email,' . $user_id],
            'cpf' => ['required','unique:users,cpf,' . $user_id],
            'matricula' => ['required'],
            'especialidade' => ['sometimes', 'required'],
            'telefone' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
        ];
    }
}
