<?php

namespace App\Http\Requests;

use App\Models\TypeCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('type_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:type_categories',
            ],
        ];
    }
}
