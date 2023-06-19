<?php

namespace App\Http\Requests;

use App\Models\Recommendation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecommendationRequest extends FormRequest
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
            'show_id' => ['sometimes', 'integer', Rule::exists('shows', 'id'), 'unique:'.Recommendation::class],
            'color' => ['sometimes', 'string', 'in:red,gray,yellow,blue,green,violet,pink,orange'],
            'logo' => ['sometimes', 'image', 'mimes:png,jpeg,jpg'],
            'character' => ['sometimes', 'image', 'mimes:png,jpeg,jpg']
        ];
    }

    public function messages(): array
    {
        return [
            'show_id.unique' => 'This show already has a recommendation or it belongs to this one.',
            'color.in' => 'Please choose between these colors: Red, Pink, Violet, Blue, Green, Yellow, Orange or Gray.'
        ];
    }
}
