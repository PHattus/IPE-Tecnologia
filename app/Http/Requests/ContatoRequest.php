<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nome'      => 'required',
            'email'     => 'required|email|unique:contatos,email',
            'telefone'  => 'required'
        ];

        if($this->method() == 'PUT' || $this->method() == 'PATCH')
            $rules['email'] .= ','.$this->route('contato')->id;

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required'     => 'Preencha o campo nome',
            'email.required'    => 'Preencha o campo email',
            'email.email'       => 'Preencha com um formato de email válido',
            'email.unique'      => 'O email informado já está cadastrado',
            'telefone.required' => 'Preencha o campo telefone'
        ];
    }
}
