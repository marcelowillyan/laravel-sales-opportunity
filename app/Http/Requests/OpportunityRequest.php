<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->method() == 'PATCH'){
            return [
                'title' => 'required|unique:opportunitys,id,'.$this->opportunity->id,
            ];
        } else {
            return [
                'title' => 'required|unique:opportunitys',
                'type' => 'required|in:text,textarea,telefone,editor',
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required'    => 'O título é obrigatório',
            'title.unique'      => 'A oportunidade já existe..',
            'type.required'     => 'É necessário informat o tipo do campo a ser criado.',
            'type.in'     => 'Tipo não foi informado como esperado.',
        ];
    }
}
