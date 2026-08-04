<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:3|max:50',
            // 'image' => 
            'phone_number' => 'required|numeric|min_digits:9|max_digits:15',
            'phone_number2' => 'nullable|numeric|min_digits:9|max_digits:15',
            // 'information' = > 
            'sub_category_id' => 'required|numeric|exists:sub_categories,id',
            'city_id' => 'required|numeric|exists:cities,id',
        ];
    }
}
