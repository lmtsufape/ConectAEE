<?php

namespace App\Http\Requests\alunos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAlunoRequest extends FormRequest
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
        $aluno_id = $this->route('aluno_id');
        return [
            'nome' => ['required'], 
            'data_nascimento' => ['required'], 
            'cpf' => ['required', 'cpf', Rule::unique('alunos')->ignore($aluno_id)], 
            'matricula' => ['required'], 
            'aluno_municipio_id' => ['required', 'exists:municipios,id'],
            'logradouro' => ['required'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'cep' => ['required'],
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
            'mora_com' => ['required'],
            'historico_comum' => ['required'],
            'historico_especifico' => ['required'],
            'motivo_encaminhamento_aee' => ['required'],
            'escolaridade_atual_aluno' => ['required'],
            'avaliacao_geral_familiar' => ['required'],
            'avaliacao_geral_escolar' => ['required'],
            'anexos_laudos' => ['required_if:tem_anexos_laudos,true'],
            'cid' => ['required'],
            'descricao_cid' => ['required'],
            'imagem' => ['mimes:jpeg,png,jpg|max:2048'],
            'gre_id' => 'required|exists:gres,id',
            'municipio_id' => 'required|exists:municipios,id',
            'escola_id' => 'required|exists:escolas,id',
        ];
    }

    public function messages(): array
    {
        return [

        ];
    }
}
