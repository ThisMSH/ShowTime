<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubtitleRequest extends FormRequest
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
            'episode_id' => ['required', 'integer', Rule::exists('episodes', 'id')],
            'subtitle_name' => ['required', 'string', 'max:20'],
            'subtitle_file' => ['required', 'file', 'max:1024']
        ];
    }
}
