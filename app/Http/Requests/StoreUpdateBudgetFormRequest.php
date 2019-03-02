<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBudgetFormRequest extends FormRequest
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
        $id = $this->segment(4);
           return [
                'empresa'          => 'min:3|max:2000',
                'nome'             => 'min:3|max:100',
                'data'             => 'min:3|max:100',
                'telefone'         => 'min:11|max:18',
                'celular'          => 'min:11|max:17',
                'estado'           => 'min:11|max:17',
                'cidade'           => 'min:2|max:17',
                'cep'              => 'min:9|max:17',
                'mensagem'         => 'min:3|max:17',
            ];
    }
}
