<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class CareServicesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'care_services_name' => 'required|string|max:255',
            'single_services_price' => 'required|numeric|min:0',
            'triple_services_price' => 'required|numeric|min:0',
            'seven_services_price' => 'required|numeric|min:0',
            'care_services_description' => 'required|string',
            'care_services_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
