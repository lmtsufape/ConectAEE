<?php

namespace App\Http\Requests\escolas;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEscolaRequest extends FormRequest
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
            'logradouro' => ['required', 'string', 'min:3', 'max:255'],
            'numero'        => ['required'], 
            'bairro' => ['required', 'string', 'min:3', 'max:255'],
            'cep'           => ['required'],
            'codigo_mec'    => ['required'], 
            'nome' =>       ['required', 'string', 'min:3', 'max:255'],
            'telefone'      => ['required'], 
            'email'         => ['required', 'email'], 
            'municipio_id'  => ['required', 'exists:municipios,id'],
            'gre_id'  => ['required', 'exists:gres,id']
        ];
    }
}
