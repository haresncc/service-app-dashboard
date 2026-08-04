<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // $id = $this->route('sub_category');
        // // Review reading  category_id
        // $category_id = $this->route('category_id');
        // 'name' => 'required|string|min:3|max:50|unique:sub_categories,name,' . $id . ',id,category_id,' . $category_id,
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('sub_categories')->ignore($this->route('sub_category'))->where(function ($query) {
                    return $query->where('category_id', $this->category_id);
                }),
            ],
            'category_id' => 'required|numeric|exists:categories,id',
            // 'image' => 
        ];
    }
}
