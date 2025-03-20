<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'comment' => 'required',
        ];
    }
}
