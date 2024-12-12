<?php

namespace App\Http\Requests\escolas;

use Illuminate\Foundation\Http\FormRequest;

class StoreEscolaRequest extends FormRequest
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
            'logradouro'    => 'required', 
            'numero'        => 'required', 
            'bairro'        => 'required', 
            'cep'           => 'required',
            'codigo_mec'    => 'required', 
            'nome'          => 'required', 
            'telefone'      => 'required', 
            'email'         => 'required', 
            'municipio_id'  => 'required'
        ];
    }
}
