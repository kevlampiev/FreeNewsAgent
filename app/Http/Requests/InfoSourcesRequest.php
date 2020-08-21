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

            'name'=>'required|string|between:5,60',
            'http_address'=>'required|string|between: 3,60',
            'description'=>'required|string|between: 10,1000'
        ];
    }
}
