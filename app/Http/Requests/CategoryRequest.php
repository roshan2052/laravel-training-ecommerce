<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:191',
            'slug'          => 'required|string|max:191|unique:categories,slug,' .$this->id,
            'rank'          => 'required|integer|min:1|unique:categories,rank,' .$this->id,
            // 'image_field'   => 'nullable|image',
        ];

    }

    public function messages()
    {
        return [
            '*.required' => 'Please enter :attribute',
        ];
    }
}
