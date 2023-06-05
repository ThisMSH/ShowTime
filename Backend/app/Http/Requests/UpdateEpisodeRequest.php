<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEpisodeRequest extends FormRequest
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
            'number' => ['sometimes', 'string'],
            'premium' => ['sometimes', 'integer', 'max:1', 'min:0'],
            'description' => ['sometimes', 'string'],
            'episode_type' => ['sometimes', 'integer'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpeg,jpg', 'dimensions:ratio=16/9,min_width=240,min_height=135'],
            'video' => ['sometimes', 'file', 'mimes:mp4,mkv'],
            'show_id' => ['sometimes', 'integer']
        ];
    }

    public function messages(): array
    {
        return [
            'premium.integer' => 'The premium value is invalid',
            'premium.max' => 'The premium value is invalid',
            'premium.min' => 'The premium value is invalid',
        ];
    }
}
