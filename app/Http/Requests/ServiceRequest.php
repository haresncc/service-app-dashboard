<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

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
            'name_en' => 'required|string|min:3|max:50',
            'phone_number' => 'required|numeric|min_digits:9|max_digits:15',
            'phone_number2' => 'nullable|numeric|min_digits:9|max_digits:15',
            // 'information' = > 
            'sub_category_id' => 'required|numeric|exists:sub_categories,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'priority' => 'required|numeric|between:1,4',
            'image' => File::image()->max(5 * 1024),
            'image2' => File::image()->max(5 * 1024),
            'image3' => File::image()->max(5 * 1024),
            'update-location' => 'nullable|boolean',
            'confirmed' => 'nullable|boolean',
        ];
    }
}
