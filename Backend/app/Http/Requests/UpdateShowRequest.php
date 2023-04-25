<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:500'],
            'season' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'cover' => ['sometimes', 'image', 'mimes:png,jpeg,jpg', 'dimensions:ratio=7/10,min_width=420,min_height=600'],
            'wide_cover' => ['sometimes', 'image', 'mimes:png,jpeg,jpg', 'dimensions:ratio=9/5,min_width=900,min_height=500'],
            'category_id' => ['sometimes', 'integer'],
            'sequel' => ['sometimes', 'nullable', 'integer'],
            'prequel' => ['sometimes', 'nullable', 'integer'],
        ];
    }
}
