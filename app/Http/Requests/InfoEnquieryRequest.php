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
            'username' => 'required|string|between:2,60',
            'phone' => 'required|regex:/^\+\d(\d{3})(\d{3})(\d{4})$/',
            'email' => 'required|email',
            'description' => 'required|string|between: 20,1000'

        ];
    }
}
