<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|min:5',
            'content' => 'required|max:5000',
            'category' => 'required|exists:news_categories,id',
            //'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            //'published' => 'boolean'
        ];
    }
}
