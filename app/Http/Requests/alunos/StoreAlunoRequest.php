<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
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
            'nome' => ['required'], 
            'data_de_nascimento' => ['required'], 
            'cpf' => ['required', 'cpf'], 
            'matricula' => ['required'], 
            'idade_inicio_estudos' => ['required'], 
            'idade_escola_atual' => ['required'], 
            'nome_pai' => ['required'], 
            'escolaridade_pai' => ['required'], 
            'profissao_pai' => ['required'], 
            'nome_mae' => ['required'], 
            'escolaridade_mae' => ['required'], 
            'profissao_mae' => ['required'], 
            'num_irmaos' => ['required'], 
            'contato_responsavel' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            
        ]
    }
}
