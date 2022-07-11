<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'category_id'   => 'required|integer',
            'name'          => 'required|string|max:191',
            'slug'          => 'required|string|max:191|unique:sub_categories,slug,' .$this->id,
            'rank'          => 'required|integer|min:1|unique:sub_categories,rank,' .$this->id,
            'image_field'   => 'nullable|image',
        ];

    }

    public function messages()
    {
        return [
            'category_id.required'  => 'Please select category',
            '*.required'            => 'Please enter :attribute',
        ];
    }
}
