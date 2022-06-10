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
                'price' => 'required',
                'seller' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required'    => 'É necessário informar um cliente...',
            'title.unique'    => 'Já existe uma oportunidade para este cliente...',
            'price.required'     => 'É necessário informar o valor da oportunidade...',
            'seller.required'     => 'É necessário informar um vendedor...',
        ];
    }
}
