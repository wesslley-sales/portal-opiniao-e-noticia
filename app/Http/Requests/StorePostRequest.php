<?php

namespace App\Http\Requests;

use App\Models\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('post_create');
    }

    public function rules(): array
    {
        return [
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'required',
                'array',
            ],
            'title' => [
                'string',
                'required',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'content' => [
                'required',
            ],
            'source' => [
                'string',
                'nullable',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'required',
                'array',
            ],
            'published_at' => [
                'required',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
