<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoSourcesRequest extends FormRequest
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
        return [

            'name' => 'required|string|between:5,255',
            'http_address' => 'required|string|max: 255',
            'description' => 'string|between: 10,1000',
            'default_category_name'=>'string|max: 255'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название источника',
            'http_address' => 'Http адрес',
            'default_category_name'=>'Категория по умолчанию',
            'description' => 'Краткая информация об источнике',
        ];
    }
}
