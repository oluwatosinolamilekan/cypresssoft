<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class FilterActivity extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'start_date' => 'required|date_format:d/m/Y',
            'end_date' => 'required|date_format:d/m/Y|after_or_equal:start_date',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'Please enter a valid start date',
            'start_date.date_format' => 'Please enter a valid start date in the format of d/m/y',
            'end_date.required' => 'Please enter a valid end date',
            'end_date.date_format' => 'Please enter a valid end date in the format of d/m/y',
            'end_date.after_or_equal' => 'The end date must be equal to or after the start date',
        ];
    }
}
