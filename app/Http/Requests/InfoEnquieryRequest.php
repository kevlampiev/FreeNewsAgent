<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoEnquieryRequest extends FormRequest
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
            'description' => 'required|string|between: 10,1000'
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'Описание запрашиваемой информации'
        ];
    }
}
