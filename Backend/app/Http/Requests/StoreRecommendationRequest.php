<?php

namespace App\Http\Requests;

use App\Models\Recommendation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRecommendationRequest extends FormRequest
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
            'show_id' => ['required', 'integer', Rule::exists('shows', 'id'), 'unique:'.Recommendation::class],
            'color' => ['required', 'string', 'in:red,gray,yellow,blue,green,violet,pink,orange'],
            'logo' => ['required', 'image', 'mimes:png,jpeg,jpg'],
            'character' => ['required', 'image', 'mimes:png,jpeg,jpg']
        ];
    }

    public function messages(): array
    {
        return [
            'show_id.unique' => 'This show already has a recommendation.',
            'color.in' => 'Please choose between these colors: Red, Pink, Violet, Blue, Green, Yellow, Orange or Gray.'
        ];
    }
}
