<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|between:5,255',
            'is_private' => 'nullable|integer|between:0,1',
            'announcement' => 'required|string|between: 20,255',
            'article_body' => 'required|string|min: 50',
            'category_id' => 'required|integer|exists:news_categories,id',
            'source_id' => 'required|integer|exists:news_sources,id'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок статьи',
            'announcement' => 'Аннотация',
            'article_body' => 'Содержание статьи',
            'category_id' => 'Категория статьи',
            'source_id' => 'Источник статьи',
        ];
    }
}
