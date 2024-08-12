<?php

namespace App\Http\Requests;

use App\Models\State;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('state_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:1',
                'max:250',
                'required',
                'unique:states',
            ],
            'code' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'uf' => [
                'string',
                'min:1',
                'max:2',
                'required',
            ],
        ];
    }
}