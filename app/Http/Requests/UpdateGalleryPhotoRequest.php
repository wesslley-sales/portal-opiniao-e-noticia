<?php

namespace App\Http\Requests;

use App\Models\GalleryPhoto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGalleryPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_photo_edit');
    }

    public function rules()
    {
        return [
            'images' => [
                'array',
                'required',
            ],
            'images.*' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}