<?php

namespace App\Http\Requests;

use App\Models\Trailer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrailerRequest extends FormRequest
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
            'show_id' => ['required', 'integer', Rule::exists('shows', 'id')],
            'title' => ['required', 'string'],
            'trailer' => ['required', 'string', 'unique:'.Trailer::class]
        ];
    }

    public function messages(): array
    {
        return [
            'trailer.unique' => 'This trailer already exist.',
        ];
    }
}
