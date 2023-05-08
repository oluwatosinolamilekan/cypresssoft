<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActivityRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'user_id' => 'nullable|exists:users,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function validated($key= null, $default = null){
        $validated = $this->validator->validated();
        if (request()->hasFile('image')) {
            $imageName = time().'.'.request()->image->extension();
            $path = request()->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }
        return $validated;
    }
}
