<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCmsFormRequest extends FormRequest
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
           // segment pega a posicao do id na rota
           // /api/v1/cms/id
           $id = $this->segment(4);
           return [
                'title'             => 'min:3|max:2000',
                'name'              => 'min:3|max:2000',
                'description'       => 'min:3|max:2000',
                'copyright'         => 'min:3|max:2000',
                'keywords'          => 'min:3|max:2000',
                'logo'              => 'image',
                'foneA'             => 'min:3|max:100',
                'foneB'             => 'min:3|max:100',
                'localizacao'       => 'min:3|max:1000',
                'cor_title'         => 'min:4|max:7',
                'cor_background'    => 'min:4|max:7',
                'cor_texto'         => 'min:4|max:7',
            ];
    }
}
