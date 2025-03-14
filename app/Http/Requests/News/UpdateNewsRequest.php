<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }
}
