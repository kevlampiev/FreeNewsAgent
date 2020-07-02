<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsProcessRequest extends FormRequest
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
            'title'=>'required|string|between:5,60',
            'is_private'=>'nullable|integer|between:0,1',
            'announcement'=>'required|string|between: 20,60',
            'article_body'=>'required|string|between: 100,1000',
            'category_id'=>'required|integer|exists:news_categories,id'
        ];
    }
}
