<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEpisodeRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:500'],
            'number' => ['required', 'string'],
            'premium' => ['required', 'integer', 'max:1', 'min:0'],
            'description' => ['required', 'string'],
            'episode_type' => ['sometimes', 'integer'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpeg,jpg', 'dimensions:ratio=16/9,min_width=240,min_height=135'],
            'video' => ['required', 'file', 'mimes:mp4,mkv'],
            'show_id' => ['required', 'integer']
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
