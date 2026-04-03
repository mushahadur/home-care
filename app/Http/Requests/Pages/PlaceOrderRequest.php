<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PlaceOrderRequest extends FormRequest
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
        $user = Auth::user();
        if (!$user) {
            return [
                'patient_name' => 'required|string|max:255| min:3',
                'email' => 'required|string|email|max:255 | unique:users,email',
                'phone' => 'required|string|max:11|min:11 | unique:users,phone',
                'address' => 'required|string|max:500 | min:6',
                'preferred_date' => 'required|date|after_or_equal:today',
                'preferred_time' => 'required', //"preferred_time" => "Morning (8 AM – 12 PM)"
                'prescription' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'additional_notes' => 'nullable|string|max:500',
            ];
        }
        return [
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required', //"preferred_time" => "Morning (8 AM – 12 PM)"
            'prescription' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'additional_notes' => 'nullable|string|max:500',
        ];
    }
}
